<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Saving;
use App\Loan;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reportShu()
    {
        return view('report.form_1');
    }

    public function reportShuMember()
    {
        return view('report.form_2');
    }

    public function showResult()
    {
        return view('report.result');
    }

}
