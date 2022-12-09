<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('characters', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('affiliation');
            $table->string('constellation');
            $table->text('description');
            $table->string('domain');
            $table->integer('element_id');
            $table->integer('gender_id');
            $table->integer('rarity');
            $table->integer('substat_id');
            $table->string('title')->nullable();
            $table->integer('weapon_type_id');
            $table->integer('region_id')->nullable();
            $table->string('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
}
