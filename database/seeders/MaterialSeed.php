<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [

        ];
        $aUrl =
            'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru/todo.json';

        $ch = curl_init($aUrl);

        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data = object_to_array(json_decode($response));

        foreach ($data['pageProps']['materialsMap'] as $pageProp) {
            Material::create([
                'name'   => $pageProp['name'],
                'rarity' => $pageProp['rarity'],
                'type'   => $pageProp['type'],
            ]);
        }
    }

}
