<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporans', function($table) {
           $table->string('pasal')->nullable->change();
            $table->string('status_laporan')->nullable->change();
            $table->string('no_surat')->nullable->change();
            $table->date('tanggal_surat')->nullable->change();
            $table->text('alasan')->nullable->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporans', function($table) {
            $table->dropColumn('pasal');
            $table->dropColumn('status_laporan');
            $table->dropColumn('no_surat');
            $table->dropColumn('tanggal_surat');
            $table->dropColumn('alasan');
        });
    }
}
