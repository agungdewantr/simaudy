<?php

namespace App\Http\Controllers;

use App\transaksi;
use App\jenispaket;
use App\user;
use Illuminate\Support\Carbon;
use DB;
use Illuminate\Http\Request;

class transaksiController extends Controller
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
                    ->select('users.name','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket')
                    ->get();
                    return view('transaksi.transaksi-read', compact('transaksi'));

        // $transaksi = \App\transaksi::with('users','jenis_paket')->paginate(10);
        // return view('transaksi.transaksi-read', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users')->where('id_role', '=' ,4)->get();
        return view('transaksi.transaksi-tambah', compact('user'));
    }

    public function getpaket()
    {
      $paket = \App\jenispaket::all();
      return response()->json($paket);
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
        'jenispaket' => 'required',
        'berat_pakaian' => 'required'
      ]);
      transaksi::create($request->all());
      $transaksi = $request->all();
      $tgl =Carbon::now()->format('d-M-Y');
      if ($request->id_paket == 1) {
        $tglselesai = Carbon::now()->addDays(1)->format('d-M-Y');
      }
      else {
        $tglselesai = Carbon::now()->addDays(3)->format('d-M-Y');
      }
      return redirect('/transaksi/tambah')->with('status', "$request->jumlah_pembayaran ")
                                  ->with('tglawal', "$tgl")
                                    ->with('tglselesai', " $tglselesai");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
