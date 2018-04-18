<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateinfosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->integer('perkara_id')->unsigned();
            $table->integer('status_verifikasi');
            $table->string('file_foto');
            $table->string('narasi');
            $table->string('lat');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('perkara_id')->references('id')->on('perkaras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infos');
    }
}
