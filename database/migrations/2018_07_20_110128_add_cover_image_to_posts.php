<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverImageToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add cover images to posts table when migration is run
        Schema::table('posts', function ($table) {
            $table->string('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // add cover images to posts table when migration is run
        Schema::table('posts', function ($table) {
            $table->dropColumn('cover_image');
        });
    }
}