<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add user id to posts table when migration is run
        Schema::table('posts', function ($table) {
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
          * @return void
          */
    public function down() 
    {
        // remove user id
        Schema::table('posts', function ($table) {
            $table->dropColumn('user_id');
        });
    }
}