<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $PrimaryKey = 'id_transaksi';
    protected $fillable = ['id_users','id_paket','berat_pakaian','jumlah_pembayaran','alamat','status','jenistransaksi','idlemari','id_tempat_laundry','status_pengantaran','deskripsi_penilaian','rating'];

}
