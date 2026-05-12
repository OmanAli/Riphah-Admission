<?php

namespace App\Http\Controllers;

use App\Models\OfferLetter;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferLetterController extends Controller
{

    public function index()
    {
        $data = OfferLetter::all();
        return view('pages.config.offer_letters', compact('data'));
    }
    public function create()
    {
        $programs = Program::where('active', 1)->where('sap_status', 1)->where('fee_status', 1)->get();
        return view('pages.config.create_offerletter', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'instructions'      => 'required',
            // 'oas_program_id'   => 'required|exists:programs,id',
        ]);
        try {
            DB::beginTransaction();

            OfferLetter::create([
                'name' => $request->name,
                'instructions' => $request->instructions,
                'oas_program_id' => $request->oas_program_id ?? null,
            ]);
            DB::commit();

            return redirect()->route('offer_letter.index')->with('message', 'Offer Letter Created Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $data = OfferLetter::findOrFail($id);
        return view('pages.config.edit_offerletter', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'instructions'      => 'required',
        ]);
        try {
            DB::beginTransaction();

            $offerLetter = OfferLetter::findOrFail($id);
            $offerLetter->update([
                'name' => $request->name,
                'instructions' => $request->instructions,
            ]);
            DB::commit();

            return redirect()->route('offer_letter.index')->with('message', 'Offer Letter Updated Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $offerLetter = OfferLetter::findOrFail($id);
            $offerLetter->delete();

            DB::commit();

            return redirect()->route('offer_letter.index')->with('message', 'Offer Letter Deleted Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
