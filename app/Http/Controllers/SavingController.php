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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
