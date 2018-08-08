<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Connect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follow_user', function (Blueprint $table) {
            $table->foreign('user_ed_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_ing_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follow_user', function (Blueprint $table) {
            $table->dropForeign('user_ing_id');
            $table->dropForeign('user_ed_id');
        });
    }
}
