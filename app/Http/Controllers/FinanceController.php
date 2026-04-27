<?php

namespace App\Http\Controllers;



class FinanceController extends Controller
{
    public function pending_fee()
    {
        return view('pages.pending_fee');
    }

    public function approved_fee()
    {
        return view('pages.approved_fee');
    }

    public function receipt(Request $request)
    {
        $applications = Receipt::get();
        return view('pages.fee_receipt', compact('applications'));
    }
    public function received(Request $request)
    {
        $oasID = $request->input('oas_id');
        if (Receipt::where('oas_id', $oasID)->exists()) {
            return redirect()->back()->with('error', 'Receipt for this application already exists.');
        }
        $application = Application::where('oas_id', $oasID)->with('appliedcampus')->first();
        if ($application) {
            $campus = Campus::get();
            return view('pages.fee_received', compact('application', 'campus'));
        } else {
            return redirect()->route('fee.receipt')->with('error', 'Record Not Found.');
        }
    }
    public function download_receipt(Request $request, $oasID)
    {
        $application = Application::where('oas_id', $oasID)->with('appliedcampus')->first();
        if (Receipt::where('oas_id', $oasID)->exists()) {
            $receipt = Receipt::where('oas_id', $oasID)->first();
        } else {
            $receipt = Receipt::create([
                'oas_id' => $oasID,
                'name' => $request->input('name'),
                'father_name' => $request->input('father_name'),
                'program1_id' => $application->preferenceOne->id,
                'program1_name' => $request->input('program1'),
                'applicable_fee' => $request->input('processing_fee'),
                'cash_received' => $request->input('cash_received'),
                'campus' => $request->input('campus'),
                'created_by' => auth()->user()->id,
            ]);
        }
        $data = [
            'receipt' => $receipt,
            'application' => $application,
        ];
        $pdf = Pdf::loadView('pages.downloads.receipt_pdf', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download($application->first_name . '_' . $application->last_name . '.pdf');
    }


    public function program_fee_setup()
    {
        return view('pages.program_fee_setup');
    }

    public function accountant()
    {
        $accountants = User::where('role', 2)->get();
        return view('pages.fee_reports.fee_report', compact('accountants'));
    }

    public function accountant_report(Request $request)
    {
        $accountant_id = $request->input('accountant_id');
        return view('pages.fee_reports.accountant_report', compact('accountant_id'));
    }

    public function receipt_report(Request $request)
    {
        $campus = Campus::all();
        if ($request->isMethod('post')) {
            return view('pages.fee_reports.receipt_report', compact('campus'))->with('error', 'Record Not Found.');
        } else {

            return view('pages.fee_reports.receipt_report', compact('campus'));
        }
    }

    public function fee_challan(Request $request)
    {
        if ($request->isMethod('post')) {
            return redirect()->route('fee_challan')->with('error', 'Record Not Found.');
        } else {
            return view('pages.fee_challan');
        }
    }

    public function fee_refund(Request $request)
    {
        if ($request->isMethod('post')) {
            return redirect()->route('fee_refund')->with('error', 'Record Not Found.');
        } else {
            return view('pages.fee_refund');
        }
    }
}
