<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('weapon_type');
            $table->string('element');
            $table->string('lvl_stat');
            $table->string('atk_talent');
            $table->string('element_skill_talent');
            $table->string('element_burst_talent');
            $table->string('first_passive_talent');
            $table->string('second_passive_talent');
            $table->string('icon');
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
        Schema::dropIfExists('heroes');
    }
}
