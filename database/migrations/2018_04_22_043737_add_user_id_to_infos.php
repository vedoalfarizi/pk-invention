<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos', function($table) {
            $table->integer('user_id')->unsigned()->index()->after('long');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate("CASCADE")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infos', function($table) {
            $table->dropColumn('user_id');
        });
    }
}
