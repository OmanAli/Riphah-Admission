<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function fee_report()
    {
        return view('pages.reports.fee_report_accountant');
    }

    public function fee_report_accountant(Request $request)
    {

        return view('pages.reports.fee_report');
    }
}
