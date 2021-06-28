<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_title');
            $table->string('genre');
            $table->string('banner');
            $table->longText('deskripsi');
            $table->string('durasi');
            $table->string('sutradara');
            $table->unsignedBigInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters')->cascadeOnDelete();
            $table->longText('jadwal');
            $table->integer('harga');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('status');
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
        Schema::dropIfExists('movies');
    }
}
