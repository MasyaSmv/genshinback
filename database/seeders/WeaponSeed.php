<?php

namespace Database\Seeders;

use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Material;
use App\Models\Weapon;
use App\Models\WeaponAscension;
use App\Models\WeaponRefinement;
use App\Models\WeaponStat;
use Illuminate\Database\Seeder;

class WeaponSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //получаем названия оружий
        $urlIds = $this->copyUrlId();

        //перебираем каждое название подставляя его в URL
        foreach ($urlIds as $urlId)
        {
            //сам URL оружия с нужными данными
            $aUrl = 'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru/weapon/'.$urlId.'.json?name='.$urlId;

            //открываем подключение
            $ch = curl_init($aUrl);

            //указываем параметры подключения
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //записываем полученные данные
            $response = curl_exec($ch);

            //конвертируем в нужный нам тип
            $data = object_to_array(json_decode($response));

            //перебираем данные
            foreach ($data['pageProps'] as $k => $weapon)
            {
                //там несколько ключей, но нам понадобится только этот
                if ($k === 'weapon')
                {
                    //запрашиваем в бд есть ли уже такое оружий, что бы не возникло дубликатов
                    $weaponCreate = Weapon::where('name', $weapon['name'])->first();

                    //раз мы убедились что такого оружий нет, будем дальше его записывать к нам
                    if (!$weaponCreate)
                    {
                        $weaponCreate = Weapon::create([
                            'name'        => $weapon['name'],
                            'description' => $weapon['description'],
                            'rarity'      => $weapon['rarity'],
                            'type'        => WeaponSwitches::typeWeapon($weapon['type']),
                            'domain'      => $weapon['domain'],
                            'passive'     => $weapon['passive'],
                            'bonus'       => $weapon['bonus'],
                        ]);

                        //если удачно все записали, то теперь нужны доп параметры оружия по разным таблицам раскидать
                        if ($weaponCreate)
                        {
                            //у некоторых оружий нет второго стата, их отсеваем
                            if (isset($weapon['stats']['secondary']))
                            {
                                //определяем второй стат и присваем ему айдишник
                                $secondaryId = WeaponSwitches::typeSecondaryStat($weapon['stats']['secondary']);
                            }

                            //массив градаций прокачки статов по уровню
                            //будут 2 записи с нимимальным уровнем и максимальным
                            foreach ($weapon['stats']['levels'] as $refinement)
                            {
                                $weaponStat = WeaponStat::create([
                                    'weapon_id'    => $weaponCreate->id,
                                    'ascension'    => $refinement['ascension'],
                                    'level'        => $refinement['level'],
                                    'base_atk'     => $refinement['primary'],
                                    'secondary_id' => $secondaryId ?? null,
                                ]);
                            }

                            //массив градаций возвышения с описанием
                            //TODO надо что-то придумать с пассивками, тк надо определять какой вклад они вносят в урон
                            foreach ($weapon['refinements'] as $refinement)
                            {
                                $weaponRefinement = WeaponRefinement::create([
                                    'weapon_id'   => $weaponCreate->id,
                                    'refinement'  => $refinement['refinement'],
                                    'description' => $refinement['desc'],
                                ]);
                            }

                            //массив градаций прокачки нужных материалов по уровню
                            foreach ($weapon['ascensions'] as $ascension)
                            {
                                //на первом прорыве материалы не нужны, так что может быть пусто
                                if (!empty($ascension['materials']))
                                {
                                    $firstMaterial = Material::where('name', $ascension['materials'][0]['name'])->first();
                                    $secondMaterial = Material::where('name', $ascension['materials'][1]['name'])->first();
                                    $thirdMaterial = Material::where('name', $ascension['materials'][2]['name'])->first();
                                }

                                $weaponAscension = WeaponAscension::create([
                                    'weapon_id'          => $weaponCreate->id,
                                    'ascension'          => $ascension['ascension'],
                                    'level'              => $ascension['level'],
                                    'cost'               => $ascension['cost'] ?? 0,
                                    'first_material_id'  => isset($firstMaterial) ? $firstMaterial->id : null,
                                    'second_material_id' => isset($secondMaterial) ? $secondMaterial->id : null,
                                    'third_material_id'  => isset($thirdMaterial) ? $thirdMaterial->id : null,
                                ]);

                                //тк мы записали в цикле переменную, надо после записи их удалить, что бы на следующую запись там не было значений
                                unset($firstMaterial);
                                unset($secondMaterial);
                                unset($thirdMaterial);
                            }
                        }
                    }
                }
            }

            curl_close($ch);
        }
    }

    /**
     * @return array
     */
    public function copyUrlId() : array
    {
        //здесь будут храниться названия оружий, для вставки в URL
        $urlId = [];

        //URL от куда получаем список всех названий оружия
        $aUrl = 'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru.json';

        //открываем подключение
        $ch = curl_init($aUrl);

        //указываем параметры подключения
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //записываем полученные данные
        $response = curl_exec($ch);

        //конвертируем в нужный нам тип
        $data = object_to_array(json_decode($response));

        //перебираем массив и записываем названия оружий
        foreach ($data['pageProps']['weapons'] as $weapon)
            $urlId[] = $weapon['id'];

        //закрываем подключение
        curl_close($ch);

        //возвращаем массив названий
        return $urlId;
    }

}
