<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonduzensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SalonDuzens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('salon_id');
            $table->index(['salon_id']);
            $table->unique(['salon_id']);
            $table->foreign('salon_id')->references('salon_id')->on('salons');

            $table->string('sits_line');
            $table->text('sits_row');
            $table->string('sits_number');

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
        Schema::drop('SalonDuzens');
    }
}
