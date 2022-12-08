<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('materials', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rarity');
            $table->integer('type');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
}
