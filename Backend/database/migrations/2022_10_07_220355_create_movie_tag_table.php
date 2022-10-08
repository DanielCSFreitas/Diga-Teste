<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_tag', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('movie_id')->references('id')->on('movie')
                ->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')
                ->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_tag');
    }
};
