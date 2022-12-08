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
    public function run()
    {
        //сначала материалы, потом оружие, тк оружие получает айдишники материалов
        $this->call(MaterialSeed::class);
//        $this->call(WeaponSeed::class);
    }
}
