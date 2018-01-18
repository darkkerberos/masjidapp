<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengurus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabel Pengurus
        Schema::create('pengurus', function (Blueprint $table) {
            $table->increments('id_pengurus');
            $table->string('nama_pengurus');
            $table->string('email')->(unique);
            $table->string('foto');
            $table->string('phone');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengurus');
    }
}
