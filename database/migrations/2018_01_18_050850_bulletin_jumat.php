<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BulletinJumat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabel BulletinJumat
        Schema::create('bulletin_jumat', function (Blueprint $table) {
            $table->increments('id_jumat');
            $table->string('judul_khotbah');
            $table->longText('isi_khotbah');
            $table->string('khatib');
            $table->string('tanggal_bulletin');
            $table->string('imam_jumat');
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
        Schema::dropIfExists('bulletin_jumat');
    }
}
