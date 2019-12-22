<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filims', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('adi');
            $table->string('yonetmen');
            $table->string('oyuncular');
            $table->text('konu');
            $table->string('ulke');
            $table->string('yil');
            $table->string('yas_siniri');
            $table->string('kategori');
            $table->string('suresi');
            $table->boolean('gosterimde');
            $table->boolean('gelecek');
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
        Schema::drop('filims');
    }
}
