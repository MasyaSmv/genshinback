<?php

namespace Database\Seeders;

use App\Helpers\Characters\CharacterSwitches;
use App\Helpers\GenshinBuildKey;
use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Character\Character;
use App\Models\Character\CharacterAscension;
use App\Models\Character\CharacterConstellation;
use App\Models\Character\CharacterPassive;
use App\Models\Character\Skills\CharacterSkill;
use App\Models\Character\Skills\CharacterSkillAtk;
use App\Models\Character\Skills\CharacterSkillBurst;
use App\Models\Character\Skills\CharacterSkillElement;
use App\Models\Character\Skills\CharacterTalentMaterial;
use App\Models\Material\Material;
use Illuminate\Database\Seeder;

class CharacterSeed extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $urlIds = $this->copyUrlId();

        foreach ($urlIds as $urlId)
        {
            $aUrl = 'https://genshin-builds.com/_next/data/' . GenshinBuildKey::DATA_KEY . '/ru/character/' . $urlId . '.json?name=' . $urlId;

            $ch = curl_init($aUrl);

            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            $data = object_to_array(json_decode($response));

            foreach ($data['pageProps'] as $keys => $pages)
            {
                if ($keys === 'character')
                {
                    $characterCreate = Character::firstWhere('name', $pages['name']);

                    if (!$characterCreate)
                    {
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

                        if ($characterCreate)
                        {
                            foreach ($pages['ascension'] as $ascensions)
                            {
                                $firstMat = Material::firstWhere('name', $ascensions['mat1']['name']);
                                $thirdMat = Material::firstWhere('name', $ascensions['mat3']['name']);
                                $fourthMat = Material::firstWhere('name', $ascensions['mat4']['name']);

                                if (isset($ascensions['mat2']))
                                {
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

                            foreach ($pages['constellations'] as $constellations)
                            {
                                CharacterConstellation::create([
                                    'character_id' => $characterCreate->id,
                                    'description' => $constellations['description'],
                                    'name' => $constellations['name'],
                                    'level' => $constellations['level'],
                                ]);
                            }

                            foreach ($pages['passives'] as $passives)
                            {
                                CharacterPassive::create([
                                    'character_id' => $characterCreate->id,
                                    'level' => $passives['level'],
                                    'description' => $passives['description'],
                                    'name' => $passives['name'],
                                ]);
                            }
                            foreach ($pages['skills'] as $key => $skills)
                            {
                                CharacterSkill::create([
                                    'character_id' => $characterCreate->id,
                                    'description' => $skills['description'],
                                    'info' => $skills['info'],
                                    'name' => $skills['name'],
                                ]);

                                switch ($key)
                                {
                                    case 0:
                                        foreach ($skills['attributes'] as $attributes)
                                        {
                                            $data = $this->createSkills($characterCreate->id, $attributes);
                                            CharacterSkillAtk::create($data);
                                        }

                                        break;
                                    case $characterCreate->name === 'Аяка' || $characterCreate->name === 'Мона' ? 2 : 1:
                                        foreach ($skills['attributes'] as $attributes)
                                        {
                                            $data = $this->createSkills($characterCreate->id, $attributes);
                                            CharacterSkillElement::create($data);
                                        }

                                        break;
                                    case $characterCreate->name === 'Аяка' || $characterCreate->name === 'Мона' ? 3 : 2:
                                        foreach ($skills['attributes'] as $attributes)
                                        {
                                            $data = $this->createSkills($characterCreate->id, $attributes);
                                            CharacterSkillBurst::create($data);
                                        }

                                        break;
                                }
                            }

                            foreach ($pages['talent_materials'] as $materials)
                            {
                                CharacterTalentMaterial::create([
                                    'character_id' => $characterCreate->id,
                                    'level' => $materials['level'],
                                    'cost' => $materials['cost'],
                                    'first_material_id' => Material::where('name',$materials['items'][0]['name'])
                                        ->value('id'),
                                    'second_material_id' => Material::where('name',$materials['items'][1]['name'])
                                        ->value('id'),
                                    'third_material_id' => isset($materials['items'][2]) ? Material::where('name',$materials['items'][2]['name'])
                                        ->value('id') : null,
                                    'fourth_material_id' => isset($materials['items'][3]) ? Material::where('name',$materials['items'][3]['name'])
                                        ->value('id') : null,
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
     * @param $characterCreate
     * @param $attributes
     * @return array
     */
    public function createSkills($characterCreate, $attributes): array
    {
        return [
            'character_id' => $characterCreate,
            'name' => $attributes['label'],
            'level_1' => $attributes['values'][0] ?? null,
            'level_2' => $attributes['values'][1] ?? null,
            'level_3' => $attributes['values'][2] ?? null,
            'level_4' => $attributes['values'][3] ?? null,
            'level_5' => $attributes['values'][4] ?? null,
            'level_6' => $attributes['values'][5] ?? null,
            'level_7' => $attributes['values'][6] ?? null,
            'level_8' => $attributes['values'][7] ?? null,
            'level_9' => $attributes['values'][8] ?? null,
            'level_10' => $attributes['values'][9] ?? null,
            'level_11' => $attributes['values'][10] ?? null,
            'level_12' => $attributes['values'][11] ?? null,
            'level_13' => $attributes['values'][12] ?? null,
            'level_14' => $attributes['values'][13] ?? null,
            'level_15' => $attributes['values'][14] ?? null,
        ];
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

        foreach ($data['pageProps']['charactersByElement'] as $elementals)
        {
            foreach ($elementals as $elemental)
            {
                $urlId[] = $elemental['id'];
            }
        }

        curl_close($ch);

        return $urlId;
    }
}
