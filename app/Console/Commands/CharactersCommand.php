<?php

namespace App\Console\Commands;

use App\Helpers\Characters\CharacterSwitches;
use App\Helpers\GenshinBuildKey;
use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Character\Character;
use App\Models\Character\CharacterAscension;
use App\Models\Material\Material;
use Illuminate\Console\Command;

class CharactersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'char';

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

        foreach ($urlIds as $urlId) {
            $aUrl = 'https://genshin-builds.com/_next/data/' . GenshinBuildKey::DATA_KEY . '/ru/character/' . $urlId . '.json?name=' . $urlId;

            $ch = curl_init($aUrl);

            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            $data = object_to_array(json_decode($response));

            foreach ($data['pageProps'] as $keys => $pages) {
                if ($keys === 'character') {
                    $characterCreate = Character::firstWhere('name', $pages['name']);

                    if (!$characterCreate) {
                        $characterCreate = Character::create([
                            'name' => $pages['name'],
                            'affiliation' => $pages['affiliation'],
                            'constellation' => $pages['constellation'],
                            'description' => $pages['description'],
                            'domain' => $pages['domain'],
                            'element_id' => CharacterSwitches::typeElement($pages['element']),
                            'gender_id' => CharacterSwitches::typeGender($pages['gender']),
                            'rarity' => $pages['rarity'],
                            'substat_id' => CharacterSwitches::typeSubStat($pages['substat']),
                            'title' => $pages['title'] ?? null,
                            'weapon_type_id' => WeaponSwitches::typeWeapon($pages['weapon_type']),
                            'region_id' => isset($pages['region']) ? CharacterSwitches::typeRegion(
                                $pages['region']
                            ) : null,
                            'icon' => '',
                        ]);

                        if ($characterCreate) {
                            foreach ($pages['ascension'] as $ascensions) {
                                $firstMat = Material::firstWhere('name', $ascensions['mat1']['name']);
                                $thirdMat = Material::firstWhere('name', $ascensions['mat3']['name']);
                                $fourthMat = Material::firstWhere('name', $ascensions['mat4']['name']);

                                if (isset($ascensions['mat2'])) {
                                    $secondMat = Material::firstWhere('name', $ascensions['mat2']['name']);
                                }

                                CharacterAscension::create([
                                    'character_id' => $characterCreate->id,
                                    'ascension' => $ascensions['ascension'],
                                    'cost' => $ascensions['cost'],
                                    'level' => $ascensions['level'][1],
                                    'first_material_id' => $firstMat->id ?? null,
                                    'second_material_id' => isset($secondMat) ? $secondMat->id : null,
                                    'third_material_id' => $thirdMat->id ?? null,
                                    'fourth_material_id' => $fourthMat->id ?? null,
                                ]);
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

        $aUrl = 'https://genshin-builds.com/_next/data/' . GenshinBuildKey::DATA_KEY . '/ru/characters.json';

        $ch = curl_init($aUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $data = object_to_array(json_decode($response));

        foreach ($data['pageProps']['charactersByElement'] as $elementals) {
            foreach ($elementals as $elemental) {
                $urlId[] = $elemental['id'];
            }
        }

        curl_close($ch);

        return $urlId;
    }

}
