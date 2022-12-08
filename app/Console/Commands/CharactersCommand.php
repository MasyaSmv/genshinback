<?php

namespace App\Console\Commands;

use App\Helpers\GenshinBuildKey;
use App\Helpers\Weapon\WeaponSwitches;
use App\Models\Character\Character;
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
//                        echo '<pre>';
//                        var_dump($pages);
//                        echo '</pre>';
//                        die;
                        $characterCreate = Character::create([
                            'name' => $pages['name'],
                            'affiliation' => $pages['affiliation'],
                            'constellation' => $pages[''],
                            'description' => $pages['description'],
                            'domain' => $pages[''],
                            'element_id' => $pages[''],
                            'gender_id' => $pages[''],
                            'rarity' => $pages[''],
                            'substat_id' => $pages[''],
                            'title' => $pages['title'],
                            'weapon_type_id' => WeaponSwitches::typeWeapon($pages['weapon_type']),
                            'icon' => $pages[''],
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
