<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bilets', function (Blueprint $table) {
            $table->increments('bilet_id');
            $table->unsignedInteger('seans_id');
            $table->string('bilet_no');
            $table->string('barkod');
            $table->index(['seans_id']);
            $table->foreign('seans_id')->references('seans_id')->on('seans');

            $table->string('koltuk');
            $table->string('musteri_adi');
            $table->string('musteri_telefon');
            $table->string('musteri_mail');
            $table->string('fiyat_grubu');
            $table->string('toplam_tutar');
            $table->string('rezervasyon_bilet');
            $table->string('odeme_sekli');
            $table->string('odeme_kodu');

            $table->date('seans_tarihi');
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
       Schema::drop('bilets');
    }
}
