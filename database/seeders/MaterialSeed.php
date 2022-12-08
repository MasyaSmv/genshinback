<?php

namespace Database\Seeders;

use App\Helpers\GenshinBuildKey;
use App\Helpers\Materials\MaterialSwitches;
use App\Models\Material\Material;
use Illuminate\Database\Seeder;

class MaterialSeed extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        //url от куда берем данные по материалам геншина
        $aUrl = 'https://genshin-builds.com/_next/data/'.GenshinBuildKey::DATA_KEY.'/ru/todo.json';

        //открываем подключение
        $ch = curl_init($aUrl);

        //указываем параметры подключения
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //записываем полученные данные
        $response = curl_exec($ch);

        //конвертируем в нужный нам тип
        $data = object_to_array(json_decode($response));

        //перебираем полученные данные и записываем по циклу
        foreach ($data['pageProps']['materialsMap'] as $pageProp)
        {
            Material::create([
                'name'   => $pageProp['name'],
                'rarity' => $pageProp['rarity'],
                'type'   => MaterialSwitches::typeMaterial($pageProp['type']),
            ]);
        }
    }
}
