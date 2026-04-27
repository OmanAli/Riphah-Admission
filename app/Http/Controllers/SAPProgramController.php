<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SapProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SAPProgramController extends Controller
{
    public function index()
    {
        $programs = SapProgram::get();
        return view('pages.sap.programs', compact('programs'));
    }

    public function add()
    {
        $oas_programs = Program::where('sap_status',0)->get();
        return view('pages.sap.add', compact('oas_programs'));
    }

    public function store(Request $request)
    {
        if (SapProgram::where('oas_prg_id', $request->oas_prg_id)->exists()) {
            return redirect()->back()->with('error', 'Mapping for this program already exists.');
        }
        $request->validate([
            'sap_region' => 'required',
            'sap_region_id' => 'required',
            'sap_campus_name' => 'required',
            'sap_campus_id' => 'required',
            'sap_institute_name' => 'required',
            'sap_institute_id' => 'required',
            'sap_program_name' => 'required',
            'sap_program_id' => 'required',
            'profit_center' => 'required',
            'fee_category' => 'required',
            'oas_prg_name' => 'required',
            'oas_prg_id' => 'required',
            'bank_name' => 'required',
            'bank_address' => 'required',
            'bank_branch_code' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'house_bank_id' => 'required',
            'company_code' => 'required',
            'customer_code' => 'required',
            'hk_tid' => 'required',
            'bank_gl' => 'required',
            'is_adm_challan' => 'required',
        ]);

        try {
            $program = Program::find($request->oas_prg_id);
             $program->update([
                'sap_status' => 1
            ]);
            DB::beginTransaction();
            SapProgram::create($request->all());
            DB::commit();

            return redirect()->route('sap_program.index')->with('message', 'Record Added Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $program = SapProgram::findOrFail($id);
        return view('pages.sap.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sap_region' => 'required',
            'sap_region_id' => 'required',
            'sap_campus_name' => 'required',
            'sap_campus_id' => 'required',
            'sap_institute_name' => 'required',
            'sap_institute_id' => 'required',
            'sap_program_name' => 'required',
            'sap_program_id' => 'required',
            'profit_center' => 'required',
            'fee_category' => 'required',
            'oas_prg_name' => 'required',
            'oas_prg_id' => 'required',
            'bank_name' => 'required',
            'bank_address' => 'required',
            'bank_branch_code' => 'required',
            'bank_account_name' => 'required',
            'bank_account_no' => 'required',
            'house_bank_id' => 'required',
            'company_code' => 'required',
            'customer_code' => 'required',
            'hk_tid' => 'required',
            'bank_gl' => 'required',
            'is_adm_challan' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $program = SapProgram::findOrFail($id);
            $program->update($request->all());
            DB::commit();
            return redirect()->route('sap_program.index')->with('message', 'Record Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $program = SapProgram::findOrFail($id);
            $program->delete();
            DB::commit();
            return redirect()->route('sap_program.index')->with('message', 'Record Deleted Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->with('error', $th->getMessage());
        }
    }
}
