<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ['id_role' =>'4',
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'scan_KTP' => $scanKTP,
        'status' => 'Null',
        'created_at' => date('Y-m-d h:i:s')]
      );
      return redirect('/login')->with('status','Anda Berhasil Registrasi');
    }

    public function registerlaundry(Request $request)
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
        'scan_KTP' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nama_tempat_laundry' => 'required',
        'tanggal_terbentuk' => 'required',
        'alamat_laundry' => 'required'
      ]);
      $tempat_laundry = DB::table('tempat_laundry')->insertGetId(
        ['nama_tempat_laundry' => $request->nama_tempat_laundry,
        'status_operasional' => 'Tutup',
        'alamat_laundry' => $request->alamat_laundry,
        'tanggal_terbentuk' => $request->tanggal_terbentuk,
        'created_at' => date('Y-m-d h:i:s')]
      );
      $idlaundry = $tempat_laundry;
      $scanKTP = $request->scan_KTP;
      $scanKTP = date('Y-m-d-h-i-s').$scanKTP->getClientOriginalName();
      $request->file('scan_KTP')->move('storage/img',$scanKTP);
      DB::table('users')->insert(
        ['id_role' =>'2',
        'id_tempat_laundry' =>$idlaundry,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_telp' => $request->no_telp,
        'alamat' => $request->alamat,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'scan_KTP' => $scanKTP,
        'status' => 'Null',
        'created_at' => date('Y-m-d h:i:s')]
      );
      return redirect('/login')->with('status','Anda Berhasil Registrasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
