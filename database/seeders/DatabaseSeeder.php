<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        //сначала материалы, потом оружие, дальше персонажей, тк оружие и персонажи ссылаются на айдишники материалов
        $this->call(MaterialSeed::class);
        $this->call(WeaponSeed::class);
        $this->call(CharacterSeed::class);
    }
}
