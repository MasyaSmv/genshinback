<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterSkillBurstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_skill_burst', function (Blueprint $table) {
            $table->id();
            $table->integer('character_id');
            $table->string('name');
            $table->double('level_1');
            $table->double('level_2');
            $table->double('level_3');
            $table->double('level_4');
            $table->double('level_5');
            $table->double('level_6');
            $table->double('level_7');
            $table->double('level_8');
            $table->double('level_9');
            $table->double('level_10');
            $table->double('level_11');
            $table->double('level_12');
            $table->double('level_13');
            $table->double('level_14');
            $table->double('level_15');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_skill_burst');
    }
}
