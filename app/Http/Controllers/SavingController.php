<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Saving;
use App\Deposit;

class SavingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $savings = Saving::all();
        return view('saving.list', ['savings'=>$savings]);
    }

    public function create()
    {
        $members = Member::where('status', 1)->get();
        return view('saving.add', ['members'=>$members]);
    }

    public function store(Request $request)
    {
        $data = new Saving;
        $data->no_simpanan = $request->no_simpanan;
        $data->id_anggota = $request->id_anggota;
        $data->save();
        return redirect()->route('saving.show', $data->id);
    }

    public function show($id)
    {
        $saving = Saving::find($id);
        return view('saving.deposit.list', ['saving'=>$saving]);
    }

    public function DepositStore(Request $request)
    {
        $data = new Deposit;
        $data->id_simpanan = $request->id_simpanan;
        $data->sim_pokok = $request->sim_pokok;
        $data->sim_wajib = $request->sim_wajib;
        $data->sim_sukarela = $request->sim_sukarela;
        $data->sim_total = $request->sim_total;
        $data->save();
        return response()->json($data);
    }

}
