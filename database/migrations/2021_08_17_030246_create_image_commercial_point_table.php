<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageCommercialPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_commercial_point', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('commercial_point_id')->unsigned();
            $table->foreign('commercial_point_id')->references('id')->on('commercial_points');
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
        Schema::dropIfExists('commercial_point_id');
    }
}
