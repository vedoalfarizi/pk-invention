<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateperkembanganLapsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkembangan_laps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laporan_id')->unsigned();
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
        Schema::drop('perkembangan_laps');
    }
}
