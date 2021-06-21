<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageKitNetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_kit_net', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('kit_net_id')->unsigned();
            $table->foreign('kit_net_id')->references('id')->on('kit_nets');
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
        Schema::dropIfExists('image_kit_net');
    }
}
