<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\tempatlaundry;
use \App\User;
use DB;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manajemenlaundry()
    {
        $datalaundry = DB::table('tempat_laundry')
                      ->join('users', 'users.id_tempat_laundry', '=', 'tempat_laundry.id_tempat_laundry')
                      ->select('users.name','users.id','users.status','users.no_telp','tempat_laundry.id_tempat_laundry','tempat_laundry.nama_tempat_laundry','tempat_laundry.status_operasional','tempat_laundry.alamat_laundry','tempat_laundry.tanggal_terbentuk')
                      ->where('users.id_role', '=', 2)
                      ->where('users.status','<>','Tidak Verifikasi')
                      ->get();
        return view('admin.mnjlaundry', compact('datalaundry'));
    }

    public function manajemenpelanggan()
    {
      $datapelanggan = DB::table('users')
                      ->where('users.id_role', '=', 4)
                      ->where('users.status','<>','Tidak Verifikasi')
                      ->get();
      return view('admin.mnjpelanggan', compact('datapelanggan'));
    }
    public function detailpelanggan($id)
    {
      $datapelanggan = \App\user::where('id',$id)->get();
      return view('admin.pelanggan-detail', compact('datapelanggan'));
    }

    public function deletepelanggan($id)
    {
      user::destroy($id);
      return redirect('/manajemenpelanggan')->with('status', "Pelanggan dengan Id Pelanggan : $id, Telah dihapus");
    }

    public function verifpelanggan($id){
      User::where('id', $id)
        ->update([
          'status' => 'Verifikasi'
        ]);
        return redirect('/manajemenpelanggan')->with('status', "Pelanggan dengan Id Pelanggan : $id, Berhasil diverifikasi");
    }

    public function tolakpelanggan($id){
      User::where('id', $id)
        ->update([
          'status' => 'Tidak Verifikasi'
        ]);
        return redirect('/manajemenpelanggan')->with('status', "Pelanggan dengan Id Pelanggan : $id, Tidak diverifikasi");
    }

    public function detailtempatlaundry($id){
      $datalaundry = DB::table('tempat_laundry')
                    ->join('users', 'users.id_tempat_laundry', '=', 'tempat_laundry.id_tempat_laundry')
                    ->select('users.name','users.no_telp','tempat_laundry.id_tempat_laundry','tempat_laundry.nama_tempat_laundry','tempat_laundry.status_operasional','users.status','tempat_laundry.alamat_laundry','tempat_laundry.tanggal_terbentuk')
                    ->where('users.id_role','=', 2)
                    ->where('tempat_laundry.id_tempat_laundry', '=', $id)
                    ->get();
      return view('admin.tempatlaundry-detail', compact('datalaundry'));
    }

    public function deletetempatlaundry($id)
    {
      DB::beginTransaction();
      try {
        DB::table('users')->where('id_tempat_laundry', $id)->delete();
        DB::table('tempat_laundry')->where('id_tempat_laundry', $id)->delete();
      } catch (\Exception $e) {
        DB::rollback();
      }
      DB::commit();
      return redirect('/manajemenlaundry')->with('status', "Tempat Laundry dengan Id Laundry : $id, Telah dihapus");
    }

    public function verifpemilik($id){
      User::where('id', $id)
        ->update([
          'status' => 'Verifikasi'
        ]);
        return redirect('/manajemenpelanggan')->with('status', "Pemilik dengan Id Pelanggan : $id, Berhasil diverifikasi");
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
        //
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
