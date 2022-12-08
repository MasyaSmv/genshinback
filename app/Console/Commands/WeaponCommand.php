<?php

namespace App\Console\Commands;

use App\Helpers\GenshinBuildKey;
use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Material\Material;
use App\Models\Weapon\Weapon;
use App\Models\Weapon\WeaponAscension;
use App\Models\Weapon\WeaponRefinement;
use App\Models\Weapon\WeaponStat;
use Illuminate\Console\Command;

class WeaponCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weapon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * @return void
     */
    public function handle(): void
    {
        $urlIds = $this->copyUrlId();

        foreach ($urlIds as $urlId)
        {
            $aUrl = 'https://genshin-builds.com/_next/data/' . GenshinBuildKey::DATA_KEY . '/ru/weapon/' . $urlId . '.json?name=' . $urlId;

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
                            'name' => $weapon['name'],
                            'description' => $weapon['description'],
                            'rarity' => $weapon['rarity'],
                            'type' => WeaponSwitches::typeWeapon(
                                $weapon['type']
                            ),
                            'domain' => $weapon['domain'],
                            'passive' => $weapon['passive'],
                            'bonus' => $weapon['bonus'],
                        ]);

                        if ($weaponCreate) {
                            if (isset($weapon['stats']['secondary'])) {
                                $secondaryId =
                                    WeaponSwitches::typeSecondaryStat(
                                        $weapon['stats']['secondary']
                                    );
                            }
                            foreach ($weapon['stats']['levels'] as $refinement) {
                                $weaponStat = WeaponStat::create([
                                    'weapon_id' => $weaponCreate->id,
                                    'ascension' => $refinement['ascension'],
                                    'level' => $refinement['level'],
                                    'base_atk' => $refinement['primary'],
                                    'secondary_id' => $secondaryId ?? null,
                                ]);
                            }
                            foreach ($weapon['refinements'] as $refinement) {
                                $weaponRefinement = WeaponRefinement::create([
                                    'weapon_id' => $weaponCreate->id,
                                    'refinement' => $refinement['refinement'],
                                    'description' => $refinement['desc'],
                                ]);
                            }
                            foreach ($weapon['ascensions'] as $ascension) {
                                if (!empty($ascension['materials'])) {
                                    $firstMaterial = Material::where(
                                        'name',
                                        $ascension['materials'][0]['name']
                                    )
                                        ->first();
                                    $secondMaterial = Material::where(
                                        'name',
                                        $ascension['materials'][1]['name']
                                    )
                                        ->first();
                                    $thirdMaterial = Material::where(
                                        'name',
                                        $ascension['materials'][2]['name']
                                    )
                                        ->first();
                                }
                                $weaponAscension = WeaponAscension::create([
                                    'weapon_id' => $weaponCreate->id,
                                    'ascension' => $ascension['ascension'],
                                    'level' => $ascension['level'],
                                    'cost' => $ascension['cost']
                                        ?? 0,
                                    'first_material_id' => isset($firstMaterial)
                                        ? $firstMaterial->id
                                        :
                                        null,
                                    'second_material_id' => isset($secondMaterial)
                                        ? $secondMaterial->id
                                        :
                                        null,
                                    'third_material_id' => isset($thirdMaterial)
                                        ? $thirdMaterial->id
                                        :
                                        null,
                                ]);

                                $firstMaterial = null;
                                $secondMaterial = null;
                                $thirdMaterial = null;
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
    public function copyUrlId(): array
    {
        $urlId = [];

        $aUrl =
            'https://genshin-builds.com/_next/data/' . GenshinBuildKey::DATA_KEY . '/ru.json';

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
