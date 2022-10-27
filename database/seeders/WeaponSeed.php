<?php

namespace Database\Seeders;

use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Material;
use App\Models\Weapon;
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
        $urlIds = $this->copyUrlId();

        foreach ($urlIds as $urlId) {
            $aUrl =
                'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru/weapon/' .
                $urlId . '.json?name=' . $urlId;

            $ch = curl_init($aUrl);
            curl_setopt(
                $ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            $data = object_to_array(json_decode($response));

            foreach ($data['pageProps'] as $k => $weapon) {
                if ($k === 'weapon') {
                    $weaponCreate =
                        Weapon::where('name', $weapon['name'])->first();

                    if (empty($weaponCreate)) {
                        $weaponCreate = Weapon::create([
                            'name'        => $weapon['name'],
                            'description' => $weapon['description'],
                            'rarity'      => $weapon['rarity'],
                            'type'        => WeaponSwitches::typeWeapon(
                                $weapon['type']
                            ),
                            'domain'      => $weapon['domain'],
                            'passive'     => $weapon['passive'],
                            'bonus'       => $weapon['bonus'],
                        ]);
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
        $urlId = [];

        $aUrl =
            'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru.json';

        $ch = curl_init($aUrl);

        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        $data = object_to_array(json_decode($response));

        foreach ($data['pageProps']['weapons'] as $weapon) {
            $urlId[] = $weapon['id'];
        }

        curl_close($ch);

        return $urlId;
    }

}
