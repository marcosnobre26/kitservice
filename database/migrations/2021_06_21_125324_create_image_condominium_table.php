<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageCondominiumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_condominium', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('condominium_id')->unsigned();
            $table->foreign('condominium_id')->references('id')->on('condominiums');
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
        Schema::dropIfExists('image_condominium');
    }
}
