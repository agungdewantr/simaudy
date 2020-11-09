<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('id_role')->unsigned();
          $table->string('name', 50);
          $table->string('email', 30)->unique();
          $table->string('password');
          $table->string('no_telp', 15);
          $table->string('alamat', 100);
          $table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();
          $table->timestamps();
      });

      Schema::table('users', function (Blueprint $table) {
          $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
