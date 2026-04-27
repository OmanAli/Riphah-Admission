<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\ChallanInfo;
use App\Models\FinalFee;
use App\Models\SapProgram;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getFeePrint($id)
    {
        $form_data = \App\FormData::findOrFail($id);

        $doc_no = '20' . $id . '-0';

        /* -----------------------------
            1. Generate challan number
        ------------------------------*/
        if (empty($form_data->feeChallanNumber)) {

            do {
                $R_number = rand(10000, 99999);
                $R_string = $this->RandomString();
                $feeChallanNumber = $R_string . "-" . $R_number;

                $exists = \App\FormData::where('feeChallanNumber', $feeChallanNumber)->count();

            } while ($exists != 0);

            $form_data->feeChallanNumber = $feeChallanNumber;
            $form_data->save();
        }

        /* -----------------------------
            2. Get highest fee program
        ------------------------------*/
        $programs = collect([
            $form_data->programs_id,
            $form_data->programs_id2,
            $form_data->programs_id3,
            $form_data->programs_id4,
        ])->filter(fn($id) => $id != "0");

        $highestFee = null;

        foreach ($programs as $pid) {
            $program = \App\Programs::find($pid);

            if (!$highestFee || $program->AdmissionFee > $highestFee->AdmissionFee) {
                $highestFee = $program;
            }
        }

        $countPrograms = $programs->count();

        /* -----------------------------
            3. Related data
        ------------------------------*/
        $bankAccountDetail = \App\BankAccount::findOrFail($highestFee->bankaccount_id);

        $session = \App\Admission_session::findOrFail($form_data->program_session_id1);

        $current_date = date("d-m-Y");
        $valid_date = date("d-m-Y", strtotime("+3 days"));

        /* -----------------------------
            4. SAP details
        ------------------------------*/
        $sap_pro_dtl = DB::table('sap_prog_details')
            ->where('oas_prg_id', $highestFee->id)
            ->where('is_adm_challan', 1)
            ->first();

        $con_id = DB::table('sap_prog_details')
            ->join('kuickpay', 'sap_prog_details.profit_center', '=', 'kuickpay.prctr')
            ->where('sap_prog_details.oas_prg_id', $highestFee->id)
            ->select('kuickpay.*', 'sap_prog_details.oas_prg_id')
            ->first();

        /* -----------------------------
            5. Insert / Update invoice
        ------------------------------*/
        $sap_invoice = DB::table('sap_invoice_details')
            ->where('doc_no', $doc_no)
            ->first();

        $invoiceData = [
            'oas_id' => $id,
            'doc_no' => $doc_no,
            'program_id' => $form_data->programs_id,
            'total_amount' => $highestFee->AdmissionFee,
            'installments' => 0,
            'amount_due' => round($highestFee->AdmissionFee),
            'remaining' => 0,
            'due_date' => date("Y-m-d", strtotime($valid_date)),
            'created_by' => auth()->user()->id,
            'hk_tid' => $highestFee->bankaccount_id,
        ];

        if (empty($sap_invoice)) {
            DB::table('sap_invoice_details')->insert($invoiceData);

            $this->create_fee_challan(
                $id,
                0,
                $highestFee->AdmissionFee,
                $highestFee->id,
                $valid_date
            );
        } else {
            DB::table('sap_invoice_details')
                ->where('oas_id', $id)
                ->update($invoiceData);

            $this->update_fee_challan(
                $id,
                0,
                $highestFee->AdmissionFee,
                $highestFee->id,
                $valid_date
            );
        }

        /* -----------------------------
            6. Return data for Blade
        ------------------------------*/
        return view('fee_challan', [
            'form_data' => $form_data,
            'highestFee' => $highestFee,
            'bankAccountDetail' => $bankAccountDetail,
            'session' => $session,
            'sap_pro_dtl' => $sap_pro_dtl,
            'con_id' => $con_id,
            'doc_no' => $doc_no,
            'current_date' => $current_date,
            'valid_date' => $valid_date,
        ]);
    }

    // public function download($oasID)
    // {
    //     $application = Application::where('oas_id', $oasID)->first();
    //     $SapDetails = SapProgram::where('oas_prg_id', $application->program_preference_1)->first();
    //     $doc_no = '20' . $oasID . '-0';
    //     $conID = '7319020' . $oasID . '0';

    //     $programIds = [
    //         $application->program_preference_1,
    //         $application->program_preference_2,
    //         $application->program_preference_3,
    //         $application->program_preference_4,
    //     ];
    //     $programIds = array_filter($programIds);
    //     $maxFeeRecord = FinalFee::whereIn('oas_program_id', $programIds)
    //         ->orderByDesc('admissionFee')
    //         ->first();
    //     $processingFee = $maxFeeRecord->admissionFee ?? 0;
    //     $amount_words = ucwords(trim($this->numberToWords($processingFee)));
    //     $drawnSession = AdmissionSession::where('session_status', 1)->first();
    //     $data = [
    //         'application' => $application,
    //         'doc_no' => $doc_no,
    //         'processingFee' => $processingFee,
    //         'amount_words' => $amount_words,
    //         'SapDetails' => $SapDetails,
    //         'conID' => $conID,
    //         'drawnSession' => $drawnSession,
    //     ];
    //     ChallanInfo::create([
    //         'oas_id' => $oasID,
    //         'doc_id' => $doc_no,
    //         'con_id' => $conID,
    //         'date' => date('Y-m-d'),
    //         'expiry_date' => date('Y-m-d', strtotime('+3 days')),
    //     ]);
    //     $pdf = Pdf::loadView('pages.downloads.challan_pdf', $data)
    //         ->setPaper('a4', 'landscape');

    //     return $pdf->download('Fee-Challan.pdf');
    // }
    // private function numberToWords($number)
    // {
    //     $ones = [
    //         0 => '',
    //         1 => 'one',
    //         2 => 'two',
    //         3 => 'three',
    //         4 => 'four',
    //         5 => 'five',
    //         6 => 'six',
    //         7 => 'seven',
    //         8 => 'eight',
    //         9 => 'nine',
    //         10 => 'ten',
    //         11 => 'eleven',
    //         12 => 'twelve',
    //         13 => 'thirteen',
    //         14 => 'fourteen',
    //         15 => 'fifteen',
    //         16 => 'sixteen',
    //         17 => 'seventeen',
    //         18 => 'eighteen',
    //         19 => 'nineteen'
    //     ];

    //     $tens = [
    //         2 => 'twenty',
    //         3 => 'thirty',
    //         4 => 'forty',
    //         5 => 'fifty',
    //         6 => 'sixty',
    //         7 => 'seventy',
    //         8 => 'eighty',
    //         9 => 'ninety'
    //     ];

    //     if ($number == 0) return '';

    //     if ($number < 20) return $ones[$number];

    //     if ($number < 100) {
    //         $rem = $number % 10;
    //         return trim($tens[floor($number / 10)] . ($rem ? ' ' . $ones[$rem] : ''));
    //     }

    //     if ($number < 1000) {
    //         $rem = $number % 100;
    //         return trim(
    //             $ones[floor($number / 100)] . ' hundred' .
    //                 ($rem ? ' ' . $this->numberToWords($rem) : '')
    //         );
    //     }

    //     if ($number < 100000) {
    //         $rem = $number % 1000;
    //         return trim(
    //             $this->numberToWords(floor($number / 1000)) . ' thousand' .
    //                 ($rem ? ' ' . $this->numberToWords($rem) : '')
    //         );
    //     }

    //     if ($number < 10000000) {
    //         $rem = $number % 100000;
    //         return trim(
    //             $this->numberToWords(floor($number / 100000)) . ' lakh' .
    //                 ($rem ? ' ' . $this->numberToWords($rem) : '')
    //         );
    //     }

    //     $rem = $number % 10000000;
    //     return trim(
    //         $this->numberToWords(floor($number / 10000000)) . ' crore' .
    //             ($rem ? ' ' . $this->numberToWords($rem) : '')
    //     );
    // }
}
