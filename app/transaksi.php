<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $PrimaryKey = 'id_transaksi';
    protected $fillable = ['id_users','id_paket','berat_pakaian','jumlah_pembayaran','alamat','status','jenistransaksi'];

    public function users()
    {
      return $this->belongsTo(User::class, 'id');
    }

    public function jenis_paket()
    {
      return $this->belongsTo('App\jenispaket', 'foreign_key');
    }

}
