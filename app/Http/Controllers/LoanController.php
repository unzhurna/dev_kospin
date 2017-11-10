<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Loan;
use App\Installment;

class LoanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loans = Loan::all();
        return view('loan.list', ['loans'=>$loans]);
    }

    public function create()
    {
        $members = Member::all();
        return view('loan.add', ['members'=>$members]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'no_pinjaman'=> 'required',
            'id_anggota'=> 'required',
            'ttl_pinjaman'=> 'numeric',
            'tenor'=> 'numeric',
            'jenis_pinjaman'=> 'required'
        ]);

        $data = new Loan;
        $data->no_pinjaman      = $request->no_pinjaman;
        $data->id_anggota       = $request->id_anggota;
        $data->ttl_pinjaman     = $request->ttl_pinjaman;
        $data->jenis_pinjaman   = $request->jenis_pinjaman;
        $data->bunga_pinjaman   = $request->bunga_pinjaman;
        $data->tenor            = $request->tenor;
        $data->jasa_pinjaman    = $request->jasa_pinjaman;
        $data->angs_pinjaman    = $request->angs_pinjaman;

        $data->save();

        return redirect()->route('loan.index');

    }

    public function show($id)
    {
        $loan = Loan::find($id);
        return view('loan.installment.list', ['loan'=>$loan]);
    }

    public function InstallmentStore(Request $request)
    {
        $data = new Installment;
        $data->id_pinjaman = $request->id_pinjaman;
        $data->pembayaran = $request->pembayaran;
        $data->pembayaran_ke = $request->pembayaran_ke;
        $data->save();
        return response()->json($data);
    }

}
