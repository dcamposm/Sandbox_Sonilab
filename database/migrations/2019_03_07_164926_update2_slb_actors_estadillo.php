<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update2SlbActorsEstadillo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slb_actors_estadillo', function (Blueprint $table) {
            $table->dropColumn('take_estadillo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slb_actors_estadillo', function (Blueprint $table) {
            $table->double('take_estadillo');
        });
    }
}
