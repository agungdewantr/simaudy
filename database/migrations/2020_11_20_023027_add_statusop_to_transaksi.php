<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusopToTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
          $table->bigInteger('idlemari')->unsigned();
          $table->foreign('idlemari')->references('idlemari')->on('lemari')->onDelete('cascade')->onUpdate('cascade');
          $table->bigInteger('id_tempat_laundry');
          $table->foreign('id_tempat_laundry')->references('id_tempat_laundry')->on('tempat_laundry')->onDelete('cascade')->onUpdate('cascade');
          $table->enum('status_pengantaran',['Akan Diantar','Dalam Perjalanan','Pakaian telah diterima']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            //
        });
    }
}
