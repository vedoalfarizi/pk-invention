<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKetToPerkembangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perkembangan_laps', function($table) {
            $table->text('keterangan')->after('laporan_id');
            $table->text('file')->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perkembangan_laps', function($table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('file');
        });
    }
}
