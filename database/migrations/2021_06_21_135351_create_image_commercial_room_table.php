<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageCommercialRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_commercial_room', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('commercial_room_id')->unsigned();
            $table->foreign('commercial_room_id')->references('id')->on('commercial_room');
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
        Schema::dropIfExists('image_commercial_room');
    }
}
