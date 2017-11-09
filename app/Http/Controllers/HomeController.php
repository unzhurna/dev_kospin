<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = Member::where('status', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        return view('home', ['members'=>$members]);
    }

    public function SystemSeting()
    {
        $members = Member::where('status', 1)
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        return view('setting', ['members'=>$members]);
    }

}
