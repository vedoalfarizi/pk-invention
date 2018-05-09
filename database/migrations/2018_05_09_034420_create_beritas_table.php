<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateberitasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laporan_id')->unsigned();
            $table->string('judul');
            $table->string('foto_berita');
            $table->text('narasi');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('laporan_id')->references('id')->on('laporans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beritas');
    }
}
