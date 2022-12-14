<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('weapons', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('rarity');
            $table->integer('type');
            $table->string('domain');
            $table->string('passive');
            $table->text('bonus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
}
