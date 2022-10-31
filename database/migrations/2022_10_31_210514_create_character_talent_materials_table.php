<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTalentMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_talent_materials', function (Blueprint $table) {
            $table->id();
            $table->integer('character_id');
            $table->integer('level');
            $table->integer('cost');
            $table->integer('first_material');
            $table->integer('second_material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_talent_materials');
    }
}
