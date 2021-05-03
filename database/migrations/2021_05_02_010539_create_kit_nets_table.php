<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitNetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_nets', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('image');
            $table->string('qtd_bedrooms');
            $table->string('qtd_bathrooms');
            $table->decimal('value', 10, 2);
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
        Schema::dropIfExists('kit_nets');
    }
}
