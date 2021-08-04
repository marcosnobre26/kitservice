<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommercialPointIdToCommercialRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commercial_room', function (Blueprint $table) {

            $table->bigInteger('commercial_point_id')->unsigned()->nullable();
            $table->foreign('commercial_point_id')->references('id')->on('commercial_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commercial_room', function (Blueprint $table) {
            $table->dropForeign(['commercial_point_id']);
            $table->dropColumn('commercial_point_id');
        });
    }
}
