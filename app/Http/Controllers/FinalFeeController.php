<?php

namespace App\Http\Controllers;

use App\Models\FinalFee;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinalFeeController extends Controller
{
    public function add()
    {
        $programs = Program::where('fee_status', 0)->get();
        return view('pages.finance.final_fee.add', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'oas_program_id'       => 'required',
            'admission_fee'        => 'required|numeric',
            'processing_fee'        => 'required|numeric',
            'registration_fee'     => 'required|numeric',
            'pharm_council_fee'    => 'required|numeric',
            'college_security_fee' => 'required|numeric',
            'id_card_fee'          => 'required|numeric',
            'credit_hour'          => 'required|numeric',
            'per_credit_hour'      => 'required|numeric',
            'tuition_fee'          => 'required|numeric',
            'examination_fee'      => 'required|numeric',
            'semester_enroll_fee'  => 'required|numeric',
            'service_charge'       => 'nullable|numeric',
            'tax_fee'              => 'required|numeric',
        ]);
        try {
            if (FinalFee::where('oas_program_id', $request->oas_program_id)->exists()) {
                return redirect()->back()->with('error', 'Final fee for this program already exists.');
            }
            DB::beginTransaction();
            $program = Program::find($request->oas_program_id);
            $credit_hours_fee = $request->per_credit_hour * $request->credit_hour;
            $total_fee = $request->processing_fee +
                $request->admission_fee +
                $request->registration_fee +
                $request->pharm_council_fee +
                $request->college_security_fee +
                $request->id_card_fee +
                $request->tuition_fee +
                $request->examination_fee +
                $request->semester_enroll_fee +
                $request->service_charge + $credit_hours_fee;
            $net_fee =   $total_fee + $request->tax_fee;

            FinalFee::create([
                'name'                 => $program->program_name,
                'oas_program_id'       => $request->oas_program_id,
                'admissionFee'         => $request->admission_fee,
                'processingFee'         => $request->processing_fee,
                'registrationFee'      => $request->registration_fee,
                'pharmCouncilFee'      => $request->pharm_council_fee,
                'collegeSecurityFee'   => $request->college_security_fee,
                'idCardFee'            => $request->id_card_fee,
                'credit_hour'          => $request->credit_hour,
                'per_credit_hour'      => $request->per_credit_hour,
                'tuitionFee'           => $request->tuition_fee,
                'examinationFee'       => $request->examination_fee,
                'semesterEnrollFee'    => $request->semester_enroll_fee,
                'service_charge'       => $request->service_charge,
                'income_tax'               => $request->tax_fee,
                'net_fee'              =>  $net_fee,
                'total_fee'             => $total_fee,
                'taxFee'               => $request->tax_fee,
            ]);

            $program->update([
                'fee_status' => 1
            ]);
            DB::commit();

            return redirect()->back()->with('message', 'Program fee saved successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function view()
    {
        $data = FinalFee::latest()->get();
        return view('pages.finance.final_fee.view', compact('data'));
    }
    public function edit($id)
    {
        $finalFee = FinalFee::find($id);
        return view('pages.finance.final_fee.edit', compact('finalFee'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'final_fee_name'       => 'required|string|max:50',
            'admission_fee'        => 'required|numeric',
            'registration_fee'     => 'required|numeric',
            'pharm_council_fee'    => 'required|numeric',
            'college_security_fee' => 'required|numeric',
            'id_card_fee'          => 'required|numeric',
            'credit_hour'          => 'required|numeric',
            'per_credit_hour'      => 'required|numeric',
            'tuition_fee'          => 'required|numeric',
            'examination_fee'      => 'required|numeric',
            'semester_enroll_fee'  => 'required|numeric',
            'service_charge'       => 'nullable|numeric',
            'tax_fee'              => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();
            $finalFee = FinalFee::findOrFail($id);
            $credit_hours_fee = $request->per_credit_hour * $request->credit_hour;
            $total_fee = $request->processing_fee +
                $request->admission_fee +
                $request->registration_fee +
                $request->pharm_council_fee +
                $request->college_security_fee +
                $request->id_card_fee +
                $request->tuition_fee +
                $request->examination_fee +
                $request->semester_enroll_fee +
                $request->service_charge + $credit_hours_fee;
            $net_fee =   $total_fee + $request->tax_fee;
            $finalFee->update([
                'name'                 => $request->final_fee_name,
                'admissionFee'         => $request->admission_fee,
                'registrationFee'      => $request->registration_fee,
                'pharmCouncilFee'      => $request->pharm_council_fee,
                'collegeSecurityFee'   => $request->college_security_fee,
                'idCardFee'            => $request->id_card_fee,
                'credit_hour'          => $request->credit_hour,
                'per_credit_hour'      => $request->per_credit_hour,
                'tuitionFee'           => $request->tuition_fee,
                'examinationFee'       => $request->examination_fee,
                'semesterEnrollFee'    => $request->semester_enroll_fee,
                'service_charge'       => $request->service_charge,
                'income_tax'               => $request->tax_fee,
                'total_fee'             => $total_fee,
                'net_fee'              =>  $net_fee,
                'taxFee'               => $request->tax_fee,
            ]);

            DB::commit();

            return redirect()->route('finalfee.view')->with('message', 'Final fee updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('finalfee.edit', $id)->with('error', 'Something went wrong. Please try again.');
        }
    }
}
