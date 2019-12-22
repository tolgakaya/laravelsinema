<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('media_id');
            $table->unsignedInteger('movie_id');
            $table->index(['movie_id']);
            $table->foreign('movie_id')->references('movie_id')->on('filims');

            $table->string('adi');
            $table->string('uzanti')->nullable();
            $table->boolean('poster')->default(false);
            $table->boolean('tek')->default(false);
            $table->boolean('galeri')->default(false);
            $table->boolean('video')->default(false);
            $table->boolean('tumb')->default(false);
            $table->string('url')->nullable();
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
        Schema::drop('medias');
    }
}
