<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolomToTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('alamat', '100')->nullable()->change();
            $table->enum('jenistransaksi',['offline','online']);
            $table->enum('status',['Terverifikasi','Belum terverifikasi'])->nullable();
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
