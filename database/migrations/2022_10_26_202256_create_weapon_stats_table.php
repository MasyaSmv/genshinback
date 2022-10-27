<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('weapon_id');
            $table->integer('ascension');
            $table->integer('level');
            $table->integer('base_atk');
            $table->integer('secondary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_stats');
    }
}
