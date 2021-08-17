<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToKitNetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kit_nets', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0);
            $table->decimal('rate', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kit_nets', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('rate');
        });
    }
}
