<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterAscensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('character_ascensions', static function (Blueprint $table) {
            $table->id();
            $table->integer('character_id');
            $table->integer('ascension');
            $table->integer('cost');
            $table->integer('level');
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
    public function down(): void
    {
        Schema::dropIfExists('character_ascensions');
    }
}
