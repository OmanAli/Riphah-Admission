<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function fee_report()
    {
        $accountants = User::where('role', 2)->orWhere('role', 4)->get();
        return view('pages.reports.fee_report_accountant', compact('accountants'));
    }

    public function fee_report_accountant(Request $request)
    {
        $accountant_id = $request->input('accountant_id');
        $receipts = Receipt::where('created_by', $accountant_id)->latest()->get();
        return view('pages.reports.fee_report', compact('receipts'));
    }

    public function application_report()
    {
        $campuses = Campus::get();
        $sessions = AdmissionSession::where('session_status', 1)->get();
        return view('pages.reports.application_report', compact('campuses', 'sessions'));
    }

    public function application_fee_report()
    {
        $campuses = Campus::get();
        $sessions = AdmissionSession::where('session_status', 1)->get();
        return view('pages.reports.application_report', compact('campuses', 'sessions'));
    }
    public function getPrograms($campusId)
    {
        $programs = Program::where('campus_id', $campusId)->get();

        return response()->json($programs);
    }



    public function master_report(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session' => 'required',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date',
            'program_ids' => 'required|array',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $session = AdmissionSession::find($request->session);
        if (!$session) {
            return back()->with('error', 'Session not found');
        }

        $sessionString = $session->session_type . ' ' . $session->session_year;
        $programIds = $request->program_ids;

        $applications = Application::whereBetween('created_at', [
            $request->start_date . ' 00:00:00',
            $request->end_date . ' 23:59:59'
        ])
            ->whereIn('program_preference_1', $programIds)
            ->where('session', $sessionString)
            ->with(['preferenceOne', 'preferenceTwo', 'preferenceThree', 'preferenceFour', 'appliedcampus'])
            ->get();

        return view('pages.reports.master_report', compact('applications'));
    }
}
