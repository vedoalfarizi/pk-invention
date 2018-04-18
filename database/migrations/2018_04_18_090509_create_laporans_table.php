<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatelaporansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->date('waktu_lapor');
            $table->integer('perkara_id')->unsigned();
            $table->date('waktu_kejadian');
            $table->string('tempat_kejadian');
            $table->string('korban');
            $table->string('alamat_korban');
            $table->string('kerugian');
            $table->string('pelapor');
            $table->string('uraian_kejadian');
            $table->string('saksi');
            $table->string('pasal');
            $table->string('status_laporan');
            $table->string('no_surat');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('laporans');
    }
}
