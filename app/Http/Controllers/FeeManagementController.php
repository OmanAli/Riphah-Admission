<?php

namespace App\Http\Controllers;

use App\Mail\ChallanMail;
use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\Campus;
use App\Models\ChallanInfo;
use App\Models\FinalFee;
use App\Models\Program;
use App\Models\PublishedOfferLetter;
use App\Models\Receipt;
use App\Models\SapProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class FeeManagementController extends Controller
{
    public function pending_fee()
    {
        return view('pages.finance.fee_management.pending_fee');
    }

    public function approved_fee()
    {
        return view('pages.finance.fee_management.approved_fee');
    }

    public function receipt(Request $request)
    {
        $applications = Receipt::get();
        return view('pages.finance.fee_management.fee_receipt', compact('applications'));
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
            return view('pages.finance.fee_management.fee_received', compact('application', 'campus'));
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
            $campus = Campus::where('campus_name', $request->input('campus'))->first();
            $receipt = Receipt::create([
                'oas_id' => $oasID,
                'name' => $request->input('name'),
                'father_name' => $request->input('father_name'),
                'program1_id' => $application->preferenceOne->id,
                'program1_name' => $request->input('program1'),
                'applicable_fee' => $request->input('processing_fee'),
                'cash_received' => $request->input('cash_received'),
                'campus' => $request->input('campus'),
                'campus_id' => $campus->id,
                'created_by' => auth()->user()->id,
                'created_by_name' => auth()->user()->name,
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
        return view('pages.finance.program_fee_setup');
    }

    public function accountant()
    {
        $accountants = User::where('role', 2)->orWhere('role', 4)->get();
        return view('pages.finance.fee_reports.fee_report', compact('accountants'));
    }

    public function accountant_report(Request $request)
    {
        $accountant_id = $request->input('accountant_id');
        $receipts = Receipt::where('created_by', $accountant_id)->latest()->get();
        return view('pages.finance.fee_reports.accountant_report', compact('accountant_id', 'receipts'));
    }

    public function receipt_report(Request $request)
    {
        $campus = Campus::all();
        if ($request->isMethod('post')) {
            $receipts = Receipt::where('campus_id', $request->input('campus_id'))->latest()->get();
            return view('pages.finance.fee_reports.receipt_report', compact('campus', 'receipts'));
        } else {
            $receipts = Receipt::latest()->get();
            return view('pages.finance.fee_reports.receipt_report', compact('campus', 'receipts'));
        }
    }

    public function fee_challan(Request $request)
    {
        if ($request->isMethod('post')) {
            $oasID = $request->input('oas_id');
            $application = Application::where('oas_id', $oasID)->first();
            $programIds = [
                $application->program_preference_1,
                $application->program_preference_2,
                $application->program_preference_3,
                $application->program_preference_4,
                $application->change_program_preference_id,
            ];
            $programIds = array_filter($programIds);
            $fee = FinalFee::whereIn('oas_program_id', $programIds)->get();

            $challans = ChallanInfo::where('oas_id', $oasID)->get();
            $offerLetterCheck = PublishedOfferLetter::where('oas_id', $oasID)
                ->where('status', 1)
                ->first();
            $programs = null;
            if ($offerLetterCheck && $offerLetterCheck->program_id) {
                $programs = Program::where('id', $offerLetterCheck->program_id)->get();
            }
            return view('pages.finance.fee_challan', compact('fee', 'programs', 'oasID', 'challans', 'offerLetterCheck'));
        } else {
            return view('pages.finance.fee_challan');
        }
    }

    public function getBankByProgram($id)
    {
        $program = SapProgram::where('oas_prg_id', $id)->first();

        if (!$program) {
            return response()->json([]);
        }

        return response()->json([
            [
                'id' => $program->id,
                'name' => $program->bank_name
            ]
        ]);
    }
    public function create_fee_challan(Request $request, $oasID = null)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'oas_id'     => 'required|exists:applications,oas_id',
                'program_id' => 'required|exists:programs,id',
                'sap_prg_id'    => 'required|exists:sap_programs,id',
            ]);
            $oasID = $request->input('oas_id');
            $sap_prg_id = $request->input('sap_prg_id');
            $oas_prg_id = $request->input('program_id');
            $due_date = date("d-m-Y", strtotime($request->input('due_date')));
            $installments = max((int) $request->input('installments', 1), 1);
        } else {
            $oasID = $oasID;
            $challanInfo = ChallanInfo::where('oas_id', $oasID)->first();
            if ($challanInfo) {
                $sap_prg_id = $challanInfo->sap_prg_id;
                $oas_prg_id = SapProgram::where('id', $sap_prg_id)->pluck('oas_prg_id')->first();
                $due_date = $challanInfo->expiry_date;
                $installments = $challanInfo->installments;
            } else {
                abort(404);
            }
        }
        $application = Application::where('oas_id', $oasID)->first();
        $SapDetails = SapProgram::where('id', $sap_prg_id)->first();
        $doc_no = '20' . $oasID . '-0';
        $conID  = '7319020' . $oasID . '0';
        $drawnSession = AdmissionSession::where('session_status', 1)->first();
        $fee = FinalFee::where('oas_program_id',  $oas_prg_id)->firstOrFail();
        $netFee = (float) $fee->net_fee;
        $firstInstallment = round($netFee / $installments, 2);

        $remainingAmount = $netFee - $firstInstallment;

        $valid_date = $due_date;
        if ($request->isMethod('post')) {
            ChallanInfo::updateOrCreate(
                ['oas_id' => $oasID],
                [
                    'sap_prg_id' => $sap_prg_id,
                    'doc_id'      => $doc_no,
                    'con_id'      => $conID,
                    'total_amount' => $fee->net_fee,
                    'installments' => $request->input('installments', 1),
                    'due_amount' => $firstInstallment,
                    'remaining_amount' => $remainingAmount,
                    'date'        => now()->format('Y-m-d'),
                    'expiry_date' => $due_date,
                ]
            );
        }
        $amount_words = ucwords(trim($this->numberToWords($firstInstallment)));
        $data = [
            'application' => $application,
            'doc_no' => $doc_no,
            'processingFee' => $firstInstallment,
            'amount_words' => $amount_words,
            'SapDetails' => $SapDetails,
            'conID' => $conID,
            'drawnSession' => $drawnSession,
            'valid_date' => $valid_date,
            'fee' => $fee,
        ];
        if ($request->isMethod('post')) {
            Mail::to($application->email)->send(new ChallanMail($data));
        }
        $pdf = Pdf::loadView('pages.downloads.challan_instalment_pdf', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('Fee-Challan.pdf');
        return redirect()->back()->with('message', 'Fee challan saved successfully.');
    }

    private function numberToWords($number)
    {
        $ones = [
            0 => '',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen'
        ];

        $tens = [
            2 => 'twenty',
            3 => 'thirty',
            4 => 'forty',
            5 => 'fifty',
            6 => 'sixty',
            7 => 'seventy',
            8 => 'eighty',
            9 => 'ninety'
        ];

        if ($number == 0) return '';

        if ($number < 20) return $ones[$number];

        if ($number < 100) {
            $rem = $number % 10;
            return trim($tens[floor($number / 10)] . ($rem ? ' ' . $ones[$rem] : ''));
        }

        if ($number < 1000) {
            $rem = $number % 100;
            return trim(
                $ones[floor($number / 100)] . ' hundred' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        if ($number < 100000) {
            $rem = $number % 1000;
            return trim(
                $this->numberToWords(floor($number / 1000)) . ' thousand' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        if ($number < 10000000) {
            $rem = $number % 100000;
            return trim(
                $this->numberToWords(floor($number / 100000)) . ' lakh' .
                    ($rem ? ' ' . $this->numberToWords($rem) : '')
            );
        }

        $rem = $number % 10000000;
        return trim(
            $this->numberToWords(floor($number / 10000000)) . ' crore' .
                ($rem ? ' ' . $this->numberToWords($rem) : '')
        );
    }


    public function fee_refund(Request $request)
    {
        if ($request->isMethod('post')) {
            $applications = Receipt::where('oas_id', $request->input('oas_id'))->get();
            return view('pages.finance.fee_refund', compact('applications'));
        } else {
            return view('pages.finance.fee_refund');
        }
    }
}
