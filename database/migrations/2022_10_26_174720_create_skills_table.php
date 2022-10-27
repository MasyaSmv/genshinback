<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->integer('hero_id');
            $table->text('usual_atk');
            $table->text('elemental_skill');
            $table->text('elemental_burst');
            $table->text('first_passive_talent');
            $table->text('second_passive_talent');
            $table->text('third_passive_talent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
