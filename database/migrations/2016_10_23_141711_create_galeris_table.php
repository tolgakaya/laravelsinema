<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('galeris', function (Blueprint $table) {
            $table->increments('galeri_id');
            $table->unsignedInteger('movie_id');
            $table->index(['movie_id']);
            $table->foreign('movie_id')->references('movie_id')->on('filims');

            $table->string('tur');
            $table->string('sayfa');
            $table->string('kod');
            $table->string('adi');
            $table->string('uzanti');
            $table->string('url');
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
        Schema::drop('galeris');
    }
}
