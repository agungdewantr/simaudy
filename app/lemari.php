<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lemari extends Model
{
  protected $table = 'lemari';
  protected $PrimaryKey = 'idlemari';
  protected $fillable = ['idlemari','status'];
}
