<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_movies', function (Blueprint $table) {
            $table->id();
            $table->string("from");
            $table->string('to');
            $table->string("ticket");
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('id_lounge');
            $table->foreign('id_lounge')->references('id')->on('lounges');
            $table->unsignedBigInteger('id_movies');
            $table->foreign('id_movies')->references('id')->on('moves');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_movies');
    }
}
