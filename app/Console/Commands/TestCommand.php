<?php

namespace App\Console\Commands;

use App\Helpers\GenshinBuildKey;
use App\Helpers\Materials\MaterialSwitches;
use App\Models\Material\Material;
use App\Models\Weapon\Weapon;
use App\Models\Weapon\WeaponAscension;
use DB;
use Illuminate\Console\Command;

class TestCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function handle()
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
