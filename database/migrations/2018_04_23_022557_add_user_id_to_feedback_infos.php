<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToFeedbackInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedback_infos', function($table) {
            $table->integer('user_id')->unsigned()->index()->after('status_feed');
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
        Schema::table('feedback_infos', function($table) {
            $table->dropColumn('user_id');
        });
    }
}
