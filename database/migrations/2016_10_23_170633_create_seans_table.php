<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seans', function (Blueprint $table) {
            $table->increments('seans_id');
            $table->unsignedInteger('salon_id');
            $table->index(['salon_id']);
            $table->foreign('salon_id')->references('salon_id')->on('salons');

            $table->unsignedInteger('movie_id');
            $table->index(['movie_id']);
            $table->foreign('movie_id')->references('movie_id')->on('filims');

            $table->date('bitis_tarihi');
            $table->time('saat');
            $table->decimal('standart_fiyat',16,2);
            $table->decimal('hafta_sonu_fiyati',16,2);
            $table->boolean('fix_fiyat');

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
       Schema::drop('seans');
    }
}
