<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroeOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroe_organization', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('heroe_id');
            $table->foreign('heroe_id')->references('id')->on('heroes')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');;
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heroe_organization');
    }
}
