<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tempatlaundry extends Model
{
  protected $table = 'tempat_laundry';
  protected $PrimaryKey = 'id_tempat_laundry';
  protected $fillable = ['nama_tempat_laundry','status_operasional','alamat_laundry','tanggal_terbentuk'];
}
