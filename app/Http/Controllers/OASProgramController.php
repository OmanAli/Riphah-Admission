<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class OASProgramController extends Controller
{
     public function index()
    {
        // $programs = Program::get();
        return view('pages.oas.programs');
    }
}
