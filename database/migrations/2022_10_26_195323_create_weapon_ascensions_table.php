<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponAscensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_ascensions', function (Blueprint $table) {
            $table->id();
            $table->integer('weapon_id');
            $table->integer('ascension');
            $table->integer('level');
            $table->integer('cost');
            $table->integer('first_material_id')->nullable();
            $table->integer('second_material_id')->nullable();
            $table->integer('third_material_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_ascensions');
    }
}
