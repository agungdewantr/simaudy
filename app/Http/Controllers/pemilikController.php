<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use DB;
use Illuminate\Support\Facades\Hash;

class pemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakaryawan = User::where('id_role',3)->where('id_tempat_laundry',auth()->user()->id_tempat_laundry)->get();
        return view('mnjkaryawan',compact('datakaryawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahkaryawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' =>'required|confirmed',
        'password_confirmation' =>'required',
        'no_telp' => 'required',
        'alamat' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'scan_KTP' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);
      $scanKTP = $request->scan_KTP;
      $scanKTP = date('Y-m-d-h-i-s').$scanKTP->getClientOriginalName();
      $request->file('scan_KTP')->move('storage/img',$scanKTP);
      DB::table('users')->insert(
        ['id_role' =>$request->id_role,
        'id_tempat_laundry' => auth()->user()->id_tempat_laundry,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'scan_KTP' => $scanKTP,
        'created_at' => date('Y-m-d h:i:s')]
      );

      return redirect('/manajemenkaryawan')->with('status','Karyawan baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $datakaryawan = user::where('id',$id)->get();
      return view('karyawan-detail', compact('datakaryawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      user::destroy($id);
      return redirect('/manajemenkaryawan')->with('status', "Karyawan Anda dengan Id Karyawan : $id, Telah dihapus");
    }
}
