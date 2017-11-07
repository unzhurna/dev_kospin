<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Member;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = Member::all();
        return view('member.list', ['members'=>$members]);
    }

    public function create()
    {
        return view('member.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'telepon'   => 'numeric',
            'email'     => 'email',
            'alamat'    => 'required',
        ]);

        $member = new Member;
        $member->no_anggota = $request->no_anggota;
        $member->nama = $request->nama;
        $member->telepon = $request->telepon;
        $member->email = $request->email;
        $member->kota = $request->kota;
        $member->alamat = $request->alamat;
        $member->pekerjaan = $request->pekerjaan;

        if($request->hasFile('image'))
        {
            $path = public_path('media/user/');

            if(!file_exists($path))
            {
                mkdir($path, 0777, true);
            }

            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = $path . $filename;
            Image::make($image)->resize(300, 300)->save($location);

            $member->avatar = $filename;
        }

        $member->save();

        return redirect()->route('member.index');
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit', ['member'=>$member]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required',
            'telepon'   => 'numeric',
            'email'     => 'email',
            'alamat'    => 'required',
        ]);

        $member = Member::find($id);
        $member->no_anggota = $request->no_anggota;
        $member->nama = $request->nama;
        $member->telepon = $request->telepon;
        $member->email = $request->email;
        $member->kota = $request->kota;
        $member->alamat = $request->alamat;
        $member->pekerjaan = $request->pekerjaan;

        if($request->hasFile('image'))
        {
            $path = public_path('media/user/');

            if(!file_exists($path))
            {
                mkdir($path, 0777, true);
            }

            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = $path . $filename;
            Image::make($image)->resize(300, 300)->save($location);

            $member->avatar = $filename;
        }

        $member->save();

        return redirect()->route('member.index');
    }

    public function ChangeStatus(Request $request, $id)
    {
        $member = Member::find($id);
        $member->status = $request->status;
        $member->save();
        return response()->json($member);
    }
}
