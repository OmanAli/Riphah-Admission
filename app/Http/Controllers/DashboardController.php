<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $permissionMap = [
            // 'manage applications' => ['view_submitted_application',preview_submitted_application,'approve_submitted_application,'approve_application','save_eligibility,'set_eligibility'],
        ];
        foreach ($permissionMap as $permission => $methods) {
            $this->middleware("permission:$permission")->only($methods);
        }
    }

    public function view_submitted_application(Request $request, $oasID = null)
    {

        $userId = $oasID ?? $request->input('user_id');
        $application = Application::where('oas_id', $userId)->first();
        return view('pages.dashboard.view_application', compact('application'));
    }

    public function preview_submitted_application($oasID)
    {
        $application = Application::where('oas_id', base64_decode($oasID))->first();
        if (!$application) {
            return redirect()->back()->with('error', 'Application not found.');
        }
        return view('pages.dashboard.application_preview', compact('application'));
    }

    public function print_submitted_application($oasID)
    {
        $application = Application::where('oas_id', base64_decode($oasID))->first();
        if (!$application) {
            return redirect()->back()->with('error', 'Application not found.');
        }
        return view('pages.dashboard.application_print', compact('application'));
    }

    public function approve_submitted_application(Request $request, $oasID = null)
    {
        if ($request->isMethod('post')) {
            $oasID = $request->input('user_id');
        } else {
            $oasID = base64_decode($oasID);
        }
        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->route('home')->with('error', 'Application not found.');
        }
        return view('pages.dashboard.approve_application', compact('application'));
    }

    public function approve_application(Request $request)
    {
        $oasID = $request->input('oas_id');
        $encodedID = base64_encode($oasID);
        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->route('oas.approve_submitted_application', ['oasID' => $encodedID])->with('error', 'Application not found.');
        }
        $application->application_status = 1;
        $application->application_program = $request->input('program');
        $application->save();


        return redirect()->route('oas.approve_submitted_application', ['oasID' => $encodedID])
            ->with('success', 'Application approved successfully.');
    }

    public function set_eligibility(Request $request, $oasID = null)
    {
        if ($request->isMethod('post')) {
            $oasID = $request->input('user_id');
        } else {
            $oasID = base64_decode($oasID);
        }

        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->route('home')->with('error', 'Application not found.');
        }
        return view('pages.dashboard.set_eligibility', compact('application'));
    }
    public function save_eligibility(Request $request)
    {
        $oasID = $request->input('oas_id');
        $encodedID = base64_encode($oasID);
        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->route('oas.set_eligibility', ['oasID' => $encodedID])->with('error', 'Application not found.');
        }
        $application->ok_for_admission = $request->input('eligibility_status');
        $application->save();
        return redirect()->route('oas.set_eligibility', ['oasID' => $encodedID])
            ->with('success', 'Application approved successfully.');
    }

    public function edit_application(Request $request, $oasID = null)
    {
        if ($request->isMethod('post')) {
            $oasID = $request->input('user_id');
        } else {
            $oasID = base64_decode($oasID);
        }
        $application = Application::where('oas_id', $oasID)->first();
        if (!$application) {
            return redirect()->route('home')->with('error', 'Application not found.');
        }
        return view('pages.dashboard.edit_application', compact('application'));
    }
}
