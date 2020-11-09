<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('id_paket')->unsigned();
            $table->bigInteger('berat_pakaian');
            $table->bigInteger('jumlah_pembayaran');
            $table->timestamps();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_paket')->references('id_paket')->on('jenis_paket')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
