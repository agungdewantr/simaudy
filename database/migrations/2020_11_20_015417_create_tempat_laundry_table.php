<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatLaundryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_laundry', function (Blueprint $table) {
            $table->bigIncrements('id_tempat_laundry');
            $table->string('nama_tempat_laundry');
            $table->enum('status_operasional',['Tutup','Buka']);
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
        Schema::dropIfExists('tempat_laundry');
    }
}
