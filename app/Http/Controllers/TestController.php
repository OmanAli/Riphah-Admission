<?php

namespace App\Http\Controllers;

use App\Models\AdmissionSession;
use App\Models\Application;
use App\Models\ChallanInfo;
use App\Models\FinalFee;
use App\Models\SapInvoiceDetail;
use App\Models\SapProgram;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    // public function getFeePrint($id)
    // {
    //     $form_data = \App\FormData::findOrFail($id);

    //     $doc_no = '20' . $id . '-0';

    //     /* -----------------------------
    //         1. Generate challan number
    //     ------------------------------*/
    //     if (empty($form_data->feeChallanNumber)) {

    //         do {
    //             $R_number = rand(10000, 99999);
    //             $R_string = $this->RandomString();
    //             $feeChallanNumber = $R_string . "-" . $R_number;

    //             $exists = \App\FormData::where('feeChallanNumber', $feeChallanNumber)->count();

    //         } while ($exists != 0);

    //         $form_data->feeChallanNumber = $feeChallanNumber;
    //         $form_data->save();
    //     }

    //     /* -----------------------------
    //         2. Get highest fee program
    //     ------------------------------*/
    //     $programs = collect([
    //         $form_data->programs_id,
    //         $form_data->programs_id2,
    //         $form_data->programs_id3,
    //         $form_data->programs_id4,
    //     ])->filter(fn($id) => $id != "0");

    //     $highestFee = null;

    //     foreach ($programs as $pid) {
    //         $program = \App\Programs::find($pid);

    //         if (!$highestFee || $program->AdmissionFee > $highestFee->AdmissionFee) {
    //             $highestFee = $program;
    //         }
    //     }

    //     $countPrograms = $programs->count();

    //     /* -----------------------------
    //         3. Related data
    //     ------------------------------*/
    //     $bankAccountDetail = \App\BankAccount::findOrFail($highestFee->bankaccount_id);

    //     $session = \App\Admission_session::findOrFail($form_data->program_session_id1);

    //     $current_date = date("d-m-Y");
    //     $valid_date = date("d-m-Y", strtotime("+3 days"));

    //     /* -----------------------------
    //         4. SAP details
    //     ------------------------------*/
    //     $sap_pro_dtl = DB::table('sap_prog_details')
    //         ->where('oas_prg_id', $highestFee->id)
    //         ->where('is_adm_challan', 1)
    //         ->first();

    //     $con_id = DB::table('sap_prog_details')
    //         ->join('kuickpay', 'sap_prog_details.profit_center', '=', 'kuickpay.prctr')
    //         ->where('sap_prog_details.oas_prg_id', $highestFee->id)
    //         ->select('kuickpay.*', 'sap_prog_details.oas_prg_id')
    //         ->first();

    //     /* -----------------------------
    //         5. Insert / Update invoice
    //     ------------------------------*/
    //     $sap_invoice = DB::table('sap_invoice_details')
    //         ->where('doc_no', $doc_no)
    //         ->first();

    //     $invoiceData = [
    //         'oas_id' => $id,
    //         'doc_no' => $doc_no,
    //         'program_id' => $form_data->programs_id,
    //         'total_amount' => $highestFee->AdmissionFee,
    //         'installments' => 0,
    //         'amount_due' => round($highestFee->AdmissionFee),
    //         'remaining' => 0,
    //         'due_date' => date("Y-m-d", strtotime($valid_date)),
    //         'created_by' => auth()->user()->id,
    //         'hk_tid' => $highestFee->bankaccount_id,
    //     ];

    //     if (empty($sap_invoice)) {
    //         DB::table('sap_invoice_details')->insert($invoiceData);

    //         $this->create_fee_challan(
    //             $id,
    //             0,
    //             $highestFee->AdmissionFee,
    //             $highestFee->id,
    //             $valid_date
    //         );
    //     } else {
    //         DB::table('sap_invoice_details')
    //             ->where('oas_id', $id)
    //             ->update($invoiceData);

    //         $this->update_fee_challan(
    //             $id,
    //             0,
    //             $highestFee->AdmissionFee,
    //             $highestFee->id,
    //             $valid_date
    //         );
    //     }

    //     /* -----------------------------
    //         6. Return data for Blade
    //     ------------------------------*/
    //     return view('fee_challan', [
    //         'form_data' => $form_data,
    //         'highestFee' => $highestFee,
    //         'bankAccountDetail' => $bankAccountDetail,
    //         'session' => $session,
    //         'sap_pro_dtl' => $sap_pro_dtl,
    //         'con_id' => $con_id,
    //         'doc_no' => $doc_no,
    //         'current_date' => $current_date,
    //         'valid_date' => $valid_date,
    //     ]);
    // }


}
