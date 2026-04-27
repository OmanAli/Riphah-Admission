<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\MBBS_BDS;
use App\Models\MbbsBds;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('pages.admission.approve_admission', compact('applications'));
    }
    public function approve_application()
    {
        $applications = Application::where('application_status', 1)->latest()->get();
        return view('pages.admission.approve_application', compact('applications'));
    }

    public function mbbs_application()
    {
        $applications = MbbsBds::latest()->get();
        return view('pages.admission.mbbs_application', compact('applications'));
    }

    public function register_users()
    {
        $users=User::latest()->get();
        return view('pages.admission.register_user', compact('users'));
    }
}
