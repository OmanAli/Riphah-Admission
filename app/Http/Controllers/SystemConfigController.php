<?php

namespace App\Http\Controllers;

use App\Models\AdmissionLevel;
use App\Models\AdmissionSession;
use App\Models\Campus;
use App\Models\Department;
use App\Models\FeeStructure;
use App\Models\Program;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemConfigController extends Controller
{
    public function __construct()
    {
        // $permissionMap = [
        //     'create campus' => ['campus', 'campus_store'],
        //     'edit campus' => ['campus', 'campus_update'],
        //     'create departments' => ['departments', 'department_store'],
        //     'edit departments' => ['departments', 'department_update'],
        //     'create programs' => ['programs', 'program_add'],
        //     'edit programs' => ['programs', 'program_update'],
        //     'create sessions' => ['sessions', 'session_store'],
        //     'edit sessions' => ['sessions', 'session_update'],
        // ];
        // foreach ($permissionMap as $permission => $methods) {
        //     $this->middleware("permission:$permission")->only($methods);
        // }
    }
    // Fee Structure
    public function fee_structure()
    {
        $data = FeeStructure::get();
        return view('pages.config.fee_structure', compact('data'));
    }

    public function fee_structure_store(Request $request)
    {
        $request->validate([
            'campus_name'    => 'required',
            'fee_structure' => 'required',
        ]);

        try {
            DB::beginTransaction();
            FeeStructure::create([
                'campus_name' => $request->campus_name,
                'link' => $request->fee_structure,
            ]);
            DB::commit();
            return back()->with('message', 'Data Inserted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function fee_structure_delete($id)
    {
        try {
            DB::beginTransaction();
            FeeStructure::find($id)->delete();
            DB::commit();
            return back()->with('message', 'Data Removed!.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    // Campus

    public function campus()
    {
        $this->authorize('view', Campus::class);
        $data = Campus::get();
        $regions = Region::get();
        return view('pages.config.campus', compact('data', 'regions'));
    }

    public function campus_store(Request $request)
    {
        $this->authorize('view', Campus::class);
        $request->validate([
            'campus_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Campus::create([
                'region_id' => $request->region_id ?? null,
                'campus_name' => $request->campus_name,
                'campus_head_name' => $request->campus_head_name ?? null,
                'campus_email' => $request->campus_email ?? null,
                'campus_phone' => $request->campus_phone ?? null,
                'campus_address' => $request->campus_address ?? null,
            ]);
            DB::commit();
            return back()->with('message', 'Data Inserted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function campus_update(Request $request)
    {
        $this->authorize('view', Campus::class);
        $request->validate([
            'campus_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Campus::where('id', $request->campus_id)->update([
                'campus_name' => $request->campus_name,
                'campus_head_name' => $request->campus_head_name ?? null,
                'campus_email' => $request->campus_email ?? null,
                'campus_phone' => $request->campus_phone ?? null,
                'campus_address' => $request->campus_address ?? null,
            ]);
            DB::commit();
            return back()->with('message', 'Data Updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }
    // Department
    public function departments()
    {
        $this->authorize('view', Department::class);
        $data = Department::get();
        $campus = Campus::get();
        return view('pages.config.department', compact('data', 'campus'));
    }
    public function department_store(Request $request)
    {
        $request->validate([
            'campus_id'    => 'required',
            'department_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Department::create([
                'campus_id' => $request->campus_id,
                'department_name' => $request->department_name,
            ]);
            DB::commit();
            return back()->with('message', 'Data Inserted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function department_update(Request $request)
    {
        $request->validate([
            'department_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Department::where('id', $request->department_id)->update([
                'department_name' => $request->department_name,
            ]);
            DB::commit();
            return back()->with('message', 'Data Updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }
    // Program

    public function programs()
    {
        $data = Program::get();
        foreach ($data as $key => $item) {
            $data[$key]['session'] = AdmissionSession::find($item->session_id);
        }
        $campus = Campus::get();
        $sessions = AdmissionSession::where('session_status', 1)->get();
        return view('pages.config.programs', compact('data', 'campus', 'sessions'));
    }

    public function program_add()
    {
        try {
            DB::beginTransaction();
            $campus = Campus::get();
            $sessions = AdmissionSession::where('session_status', 1)->get();
            $admission_levels = AdmissionLevel::get();
            DB::commit();
            return view('pages.config.add_program', compact('campus', 'sessions', 'admission_levels'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function getDepartments($campus_id)
    {
        $departments = Department::where('campus_id', $campus_id)->get();
        return response()->json($departments);
    }
    public function program_store(Request $request)
    {
        $request->validate([
            'campus_id'    => 'required',
            'department_id'    => 'required',
            'level'    => 'required',
            'program'    => 'required',
            'status'    => 'required',
            // 'session_id'    => 'required',
        ]);
        try {

            DB::beginTransaction();
            Program::create([
                'campus_id' => $request->campus_id,
                'department_id' => $request->department_id,
                'program_type' => $request->level,
                'program_name' => $request->program,
                'active' => $request->status,
                'session_id' => $request->session_id ?? null,
            ]);
            DB::commit();
            return redirect()->route('configuration.programs')->with('message', 'Data Inserted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function program_update(Request $request)
    {
        $request->validate([
            'program'    => 'required',
        ]);
        try {

            DB::beginTransaction();
            Program::where('id', $request->program_id)->update([
                'program_name' => $request->program,
                'session_id' => $request->session_id ?? null,
            ]);
            DB::commit();
            return back()->with('message', 'Data Updated!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    // Sessions
    public function sessions()
    {
        $data = AdmissionSession::get();
        return view('pages.config.sessions', compact('data'));
    }

    public function sessions_store(Request $request)
    {
        $request->validate([
            'session_year'    => 'required',
            'session_type'    => 'required',
            // 'session_status'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            $isFirstEntry = AdmissionSession::count() == 0;

            AdmissionSession::create([
                'session_year'   => $request->session_year,
                'session_type'   => $request->session_type,
                'session_status' => $isFirstEntry ? 1 : 0,
            ]);
            DB::commit();
            return back()->with('message', 'Data Inserted!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function sessions_update(Request $request)
    {
        DB::transaction(function () use ($request) {
            $session = AdmissionSession::findOrFail($request->session_id);

            if ($session->session_status == 1) {
                $session->update(['session_status' => 0]);
            } else {
                AdmissionSession::where('id', '!=', $session->id)
                    ->update(['session_status' => 0]);
                $session->update(['session_status' => 1]);
            }
        });

        return back()->with('success', 'Session status updated');
    }
}
