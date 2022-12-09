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
            $table->integer('first_material_id')->nullable();
            $table->integer('second_material_id')->nullable();
            $table->integer('third_material_id')->nullable();
            $table->integer('fourth_material_id')->nullable();
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
