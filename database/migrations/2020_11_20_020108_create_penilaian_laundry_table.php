<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianLaundryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_laundry', function (Blueprint $table) {
            $table->bigIncrements('id_penilaian');
            $table->bigInteger('id_tempat_laundry')->unsigned();
            $table->foreign('id_tempat_laundry')->references('id_tempat_laundry')->on('tempat_laundry')->onDelete('cascade')->onUpdate('cascade');
            $table->string('deskripsi_penilaian');
            $table->bigInteger('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_laundry');
    }
}
