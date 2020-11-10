<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenispaket;
use App\transaksi;
use DB;

class pesanlaundryController extends Controller
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
      $id = auth()->user()->id;
        $notif = DB::table('transaksi')->select('id_transaksi','id_users', 'id_paket', 'jumlah_pembayaran', 'created_at','status')
                                  ->where([['status', '=' ,'Terverifikasi'],['id_users', '=', "$id"]])
                                  ->orderBy('created_at', 'desc')
                                  ->get();
        $paket = \App\jenispaket::all();
        return view('pelanggan.pesanlaundry', compact('paket','notif'));
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
        'alamat' => 'required'
      ]);
      transaksi::create($request->all());
      return redirect('/laundrysekarang')->with('status', 'Layanan Antar-Jemput berhasil ditambahkan. Mohon menunggu kurir untuk menjemput pesanan anda!');
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
