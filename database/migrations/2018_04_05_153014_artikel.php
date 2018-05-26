<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Artikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('di_artikel');
            $table->string('judul_artikel');
            $table->longText('isi_artikel');
            $table->string('tag');
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
        //
    }
}
