<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenispaket;
use App\transaksi;
use App\lemari;
use App\penilaianlaundry;
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
      $id = auth()->user()->id;
      $transaksi = DB::table('transaksi')
                  ->join('users', 'users.id', '=', 'transaksi.id_users')
                  ->join('jenis_paket', 'jenis_paket.id_paket', '=', 'transaksi.id_paket')
                  ->join('tempat_laundry', 'tempat_laundry.id_tempat_laundry', '=', 'transaksi.id_tempat_laundry')
                  ->select('transaksi.id_transaksi','transaksi.created_at','tempat_laundry.nama_tempat_laundry','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket','transaksi.status_pengantaran','transaksi.rating','transaksi.deskripsi_penilaian')
                  ->where('transaksi.id_users', '=' , "$id")
                  ->where('transaksi.status_pengantaran', '=', 'Pakaian telah diterima/diambil')
                  ->orderBy('transaksi.created_at', 'desc')
                  ->paginate(10);
                  return view('pelanggan.riwayattransaksi', compact('transaksi'));
    }

    public function cekpesanan() {
      $id = auth()->user()->id;
      $transaksi = DB::table('transaksi')
                  ->join('users', 'users.id', '=', 'transaksi.id_users')
                  ->join('jenis_paket', 'jenis_paket.id_paket', '=', 'transaksi.id_paket')
                  ->join('tempat_laundry', 'tempat_laundry.id_tempat_laundry', '=', 'transaksi.id_tempat_laundry')
                  ->select('transaksi.id_transaksi','transaksi.created_at','tempat_laundry.nama_tempat_laundry','transaksi.jumlah_pembayaran', 'transaksi.berat_pakaian', 'jenis_paket.nama_paket','transaksi.status_pengantaran','transaksi.rating','transaksi.deskripsi_penilaian')
                  ->where('transaksi.id_users', '=' , "$id")
                  ->where([['transaksi.status_pengantaran', '<>' , 'Pakaian telah diterima/diambil'],['transaksi.status_pengantaran', '<>' , NULL]])
                  ->orderBy('transaksi.created_at', 'desc')
                  ->get();
                  return view('pelanggan.cekpesanan-read', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idtempatlaundry)
    {
      $id = auth()->user()->id;
      $lemari = DB::table('lemari')->where('status', '=' , 'Tersedia')->orderByRaw('RAND()')->take(1)->get();
        $notif = DB::table('transaksi')->select('id_transaksi','id_users', 'id_paket', 'jumlah_pembayaran', 'created_at','status')
                                  ->where([['status', '=' ,'Terverifikasi'],['id_users', '=', "$id"]])
                                  ->orderBy('created_at', 'desc')
                                  ->take(2)
                                  ->get();
        $paket = \App\jenispaket::all();
        $stoperasional = DB::table('tempat_laundry')->select('status_operasional')
                        ->where('id_tempat_laundry', '=', $idtempatlaundry)
                        ->first();
        return view('pelanggan.pesannlaundry', compact('paket','notif','lemari','stoperasional','idtempatlaundry'));
    }

    public function createrating($idtransaksi)
    {
      $idtransaksi = (int)$idtransaksi;
      $statusrating = transaksi::where('id_transaksi', $idtransaksi)->first();
      return view('pelanggan.penilaianlaundry', compact('idtransaksi','statusrating'));
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
      lemari::where('idlemari', $request->idlemari)
          ->update([
            'status' => "Terpakai"
          ]);
      return redirect("/laundrysekarang/$request->id_tempat_laundry")->with('status', 'Layanan Antar-Jemput berhasil ditambahkan. Mohon menunggu kurir untuk menjemput pesanan anda!');
    }

    public function storerating(Request $request)
    {
      $request->validate([
        'rating' => 'required|in:1,2,3,4,5',
        'deskripsi_penilaian' => 'required'
      ]);
      transaksi::where('id_transaksi', $request->id_transaksi)
          ->update([
            'rating' => $request->rating,
            'deskripsi_penilaian' => $request->deskripsi_penilaian
          ]);
      return redirect('/riwayattransaksi');
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
