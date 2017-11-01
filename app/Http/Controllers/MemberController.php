<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Member;
use App\Province;
use App\Regency;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = Member::all();
        return view('member.index', ['members'=>$members]);
    }

    public function create()
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('member.create', ['provinces'=>$provinces, 'regencies'=>$regencies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'numeric',
            'email'     => 'email',
            'address'   => 'required',
        ]);

        $member = new Member;
        $member->reg_number = $request->reg_number;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->address = $request->address;

        if($request->hasFile('image'))
        {
            $path = public_path('media/user/');

            if(!file_exists($path))
            {
                mkdir($path, 0777, true);
            }

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $location = $path . $filename;
            Image::make($image)->resize(300, 300)->save($location);
            $member->avatar = $filename;
        }

        $member->save();

        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($id);
        // return view('member.profile', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.update', ['member'=>$member]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'numeric',
            'email'     => 'email',
            'address'   => 'required',
        ]);

        $member = Member::find($id);
        $member->reg_number = $request->reg_number;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->address = $request->address;

        if($request->hasFile('image'))
        {
            $path = public_path('media/user/');

            if(!file_exists($path))
            {
                mkdir($path, 0777, true);
            }

            $image = $request->file('image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $location = $path . $filename;
            Image::make($image)->resize(300, 300)->save($location);
            $member->avatar = $filename;
        }

        $member->save();

        return redirect()->route('member.index');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
    }
}
