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
    public function up(): void
    {
        Schema::create('character_skill_bursts', static function (Blueprint $table) {
            $table->id();
            $table->integer('character_id');
            $table->string('name');
            $table->string('level_1')->nullable();
            $table->string('level_2')->nullable();
            $table->string('level_3')->nullable();
            $table->string('level_4')->nullable();
            $table->string('level_5')->nullable();
            $table->string('level_6')->nullable();
            $table->string('level_7')->nullable();
            $table->string('level_8')->nullable();
            $table->string('level_9')->nullable();
            $table->string('level_10')->nullable();
            $table->string('level_11')->nullable();
            $table->string('level_12')->nullable();
            $table->string('level_13')->nullable();
            $table->string('level_14')->nullable();
            $table->string('level_15')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('character_skill_bursts');
    }
}
