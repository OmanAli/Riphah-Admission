<?php

namespace App\Http\Controllers;

use App\Mail\OfferletterMail;
use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\MBBS_BDS;
use App\Models\MbbsBds;
use App\Models\OfferLetter;
use App\Models\Program;
use App\Models\PublishedOfferLetter;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdmissionManagementController extends Controller
{
    public function eligibility_check()
    {
        $applications = Application::latest()->get();
        return view('pages.admission.eligibility', compact('applications'));
    }

    public function eligibility_update($oasID, $value)
    {

        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->back()->with('error', 'Application not found.');
        }
        $application->ok_for_admission = $value;
        $application->save();
        return redirect()->back()->with('message', 'Application Status Updated!.');
    }

    public function approve_admission()
    {
        $applications = Application::latest()->get();

        return view('pages.admission.approve_admission', compact('applications', 'letters'));
    }
    public function approve_application()
    {
        $applications = Application::where('application_status', 1)->with('offerletter')->latest()->get();
        $programIds = $applications
            ->flatMap(function ($application) {
                return [
                    $application->program_preference_1,
                    $application->program_preference_2,
                    $application->program_preference_3,
                    $application->program_preference_4,
                    $application->change_program_preference_id,
                ];
            })
            ->filter()
            ->unique()
            ->values();
        $programs = Program::whereIn('id', $programIds)->latest()->get();
        return view('pages.admission.approve_application', compact('applications', 'programs'));
    }
    public function get_offer_letters($program_id)
        {
            // $letters = OfferLetter::where('oas_program_id', $program_id)->get();
            $letters = OfferLetter::get();
            return response()->json($letters);
        }
    public function publish_offer_letter(Request $request)
    {
        $request->validate([
            'offer_letter'    => 'required',
            'program_id'   => 'required',
            'date'    => 'required',

        ]);
        $application = Application::where('oas_id', $request->input('oas_id'))->first();
        $offer_letter = OfferLetter::where('id', $request->input('offer_letter'))->first();
        $due_date = $request->input('date');
        $session = AdmissionSession::where('session_status', 1)->first();
        if ($request->input('action') == 'preview') {
            return view('pages.admission.preview_offer_letter', compact('application', 'offer_letter', 'due_date', 'session'));
        } else {
            $publishedLetter = PublishedOfferLetter::where('oas_id', $request->input('oas_id'))->first();
            if ($publishedLetter) {
                $publishedLetter->update([
                    'program_id'   => $request->input('program_id'),
                    'offer_letter' => $request->input('offer_letter'),
                    'status'       => 1,
                    'due_date'     => $due_date,
                ]);
            } else {
                PublishedOfferLetter::create([
                    'oas_id' => $request->input('oas_id'),
                    'program_id'     => $request->input('program_id'),
                    'offer_letter'   => $request->input('offer_letter'),
                    'status'         => 1,
                    'due_date'       => $due_date,
                ]);
            }
            $program=Program::find($request->input('program_id'));
            $data = [
                'session'     => $session,
                'application' => $application,
                'date' => \Carbon\Carbon::now()->format('M d, Y'),
                'program'=> $program,
                'due_date'       => $due_date,
            ];
            Mail::to($application->email)->send(new OfferletterMail($data));
            return redirect()->back()->with('message', 'Offer Letter Published Successfully!');
        }
    }
    public function un_publish_offer_letter($id)
    {
        $publishedOfferLetter = PublishedOfferLetter::where('oas_id', $id)->first();
        if ($publishedOfferLetter) {
            $publishedOfferLetter->status = 0;
            $publishedOfferLetter->save();
            return redirect()->back()->with('message', 'Offer Letter Un-Published Successfully!');
        } else {
            return redirect()->back()->with('error', 'Published Offer Letter not found.');
        }
    }

    public function download_offer_letter($id)
    {
        $publishedOfferLetter = PublishedOfferLetter::where('oas_id', $id)->first();
        $application = Application::where('oas_id', $id)->first();
        $offer_letter = OfferLetter::where('id', $publishedOfferLetter->offer_letter)->first();
        $due_date = $publishedOfferLetter->due_date;
        $session = AdmissionSession::where('session_status', 1)->first();
        $pdf = PDF::loadView('pages.downloads.offer_letter', compact('application', 'offer_letter', 'due_date', 'session'))
            ->setPaper('a4', 'portrait');

        return $pdf->download($application->first_name . '_' . $application->last_name . '.pdf');
    }

    public function mbbs_application()
    {
        $applications = MbbsBds::latest()->get();
        return view('pages.admission.mbbs_application', compact('applications'));
    }

    public function register_users()
    {
        $users = User::latest()->get();
        return view('pages.admission.register_user', compact('users'));
    }
}
