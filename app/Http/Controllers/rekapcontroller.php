<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use DB;

class rekapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_users')
                    ->join('jenis_paket', 'jenis_paket.id_paket', '=', 'transaksi.id_paket')
                    ->select('users.name','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket', 'transaksi.created_at')
                    ->get();
                    return view('rekaptransaksi', compact('transaksi'));
     }
    public function rekap(Request $request)
    {
      $tgl1 = $request->tglawal;
      $tgl2 = $request->tglakhir;
        $transaksi = DB::table('transaksi')
                    ->join('users', 'users.id', '=', 'transaksi.id_users')
                    ->join('jenis_paket', 'jenis_paket.id_paket', '=', 'transaksi.id_paket')
                    ->select('users.name','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket', 'transaksi.created_at')
                    ->whereDate('transaksi.created_at', '>=' , $tgl1)
                    ->whereDate('transaksi.created_at', '<=' , $tgl2)
                    ->get();
                    if (count($transaksi) == 0) {
                      $transaksi = "Tidak ada transaksi untuk range tanggal tersebut!";
                    }
                    return view('rekaptransaksi', compact('transaksi'));

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
