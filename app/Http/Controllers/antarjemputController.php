<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\transaksi;
use App\lemari;
use DB;

class antarjemputController extends Controller
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
                  ->select('users.name','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket', 'transaksi.id_paket', 'transaksi.id_transaksi', 'transaksi.created_at', 'transaksi.alamat', 'transaksi.status')
                  ->where([['transaksi.jenistransaksi', '=', 'online'],['transaksi.berat_pakaian', '=', 0],['transaksi.status', '<>', 'Ditolak']])
                  ->get();
                  return view('transaksi.antarjemput-read', compact('transaksi'));
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
      $transaksi = DB::table('transaksi')
                  ->join('users', 'users.id', '=', 'transaksi.id_users')
                  ->join('jenis_paket', 'jenis_paket.id_paket', '=', 'transaksi.id_paket')
                  ->select('users.name','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.harga', 'jenis_paket.nama_paket', 'transaksi.id_paket', 'transaksi.id_transaksi', 'transaksi.created_at', 'transaksi.alamat', 'transaksi.status')
                  ->where('transaksi.id_transaksi', '=', $id)
                  ->get();
                  return view('transaksi.verifikasi-antarjemput', compact('transaksi'));
    }

    public function getpaket()
    {
      $paket = jenispaket::all();
      return response()->json($paket);
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
      $request->validate([
        'jumlah_pembayaran' => 'required',
        'berat_pakaian' => 'required'
      ]);
        transaksi::where('id_transaksi', $id)
              ->update([
                'berat_pakaian' => $request->berat_pakaian,
                'jumlah_pembayaran' => $request->jumlah_pembayaran
              ]);
        return redirect('/antarjemput')->with('status','Berat pakaian berhasil ditambah');
    }

    public function verifikasi(Request $request, $id)
    {
        transaksi::where('id_transaksi', $id)
              ->update([
                'status' => "Terverifikasi"
              ]);
        return redirect('/antarjemput')->with('status','Data Layanan antar-jemput berhasil diverifikasi');
    }

    public function tolak(Request $request, $id)
    {
        transaksi::where('id_transaksi', $id)
              ->update([
                'status' => "Ditolak"
              ]);
        $transaksi = DB::table('transaksi')
                  ->select('idlemari')
                  ->where('id_transaksi', '=', $id)
                  ->first();
        lemari::where('idlemari', "$transaksi->idlemari")
              ->update([
                'status' => "Tersedia"
              ]);
        return redirect('/antarjemput')->with('status','Data Layanan antar-jemput ditolak');
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
