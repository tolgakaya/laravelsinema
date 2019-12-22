<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeansFiyatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seans_fiyats', function (Blueprint $table) {
            $table->increments('fiyat_id');
            $table->unsignedInteger('seans_id');
            $table->index(['seans_id']);
            $table->foreign('seans_id')->references('seans_id')->on('seans');

            $table->unsignedInteger('grup_id');
            $table->index(['grup_id']);
            $table->foreign('grup_id')->references('grup_id')->on('fiyat_grups');
            $table->decimal('standart_fiyat', 16, 2);
            $table->decimal('hafta_sonu_fiyati', 16, 2);
            $table->decimal('iskonto_orani', 16, 2);
            $table->decimal('sabit_fiyat', 16, 2);
            $table->integer('bilet_adedi');
            $table->date('gecerlilik_tarihi');

            $table->boolean('iptal')->default(false);

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
        Schema::drop('seans_fiyats');
    }
}
