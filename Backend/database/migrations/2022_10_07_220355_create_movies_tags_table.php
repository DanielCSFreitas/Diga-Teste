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
        Schema::create('movies_tags', function (Blueprint $table) {
            $table->integer('movies_id')->unsigned();
            $table->integer('tags_id')->unsigned();
            
            $table->foreign('movies_id')->references('id')->on('movies')
                ->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')
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
        Schema::dropIfExists('movies_tags');
    }
};
