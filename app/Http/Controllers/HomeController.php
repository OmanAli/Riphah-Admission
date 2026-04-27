<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\FeeStructure;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('student')) {
            $feeStructures = FeeStructure::orderBy('created_at', 'desc')->get();
            $latestFeeStructures = $feeStructures->groupBy(function ($item) {
                return Str::lower($item->campus_name);
            })->map(function ($group) {
                return $group->first();
            })->values();
            $settings = GeneralSetting::first();
            $applications = Application::with([
                'preferenceOne',
                'preferenceTwo',
                'preferenceThree',
                'preferenceFour',
            ])
                ->where('user_id', auth()->user()->id)
                ->latest()
                ->get();
            return view('home', compact('latestFeeStructures', 'settings', 'applications'));
        } else {
            return view('welcome');
        }
    }

    public function change_password()
    {
        return view('change_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('message', 'Password updated successfully.');
    }
}
