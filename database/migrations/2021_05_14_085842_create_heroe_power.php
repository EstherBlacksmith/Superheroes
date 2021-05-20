<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroePower extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroe_power', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('heroe_id')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');;

            $table->foreign('heroe_id')->references('id')->on('heroes');
            $table->unsignedBigInteger('power_id');
            $table->foreign('power_id')->references('id')->on('powers')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroe_power');
    }
}
