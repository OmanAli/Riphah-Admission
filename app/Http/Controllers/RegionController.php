<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function index()
    {
        $data = Region::all();
        return view('pages.config.region', compact('data'));
    }

    public function region_store(Request $request)
    {
        $request->validate([
            'region_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Region::create([
                'region_name' => $request->region_name,
            ]);
            DB::commit();
            return redirect()->route('configuration.region')->with('message', 'Region Created Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function region_update(Request $request)
    {
        $request->validate([
            'region_name'    => 'required',
        ]);
        try {
            DB::beginTransaction();
            Region::where('id', $request->region_id)->update([
                'region_name' => $request->region_name,
            ]);
            DB::commit();
            return redirect()->route('configuration.region')->with('message', 'Region Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
