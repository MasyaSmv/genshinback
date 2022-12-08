<?php

namespace App\Console\Commands;

use App\Helpers\GenshinBuildKey;
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
        $paramsCreate = [];
        $urlIds = $this->copyUrlId();

        foreach ($urlIds as $urlId) {
            $aUrl =
                'https://genshin-builds.com/_next/data/'.GenshinBuildKey::DATA_KEY.'/ru/character/' .
                $urlId . '.json?name=' . $urlId;

            $ch = curl_init($aUrl);

            curl_setopt(
                $ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $data = object_to_array(json_decode($response));

            foreach ($data as $pages) {
                echo '<pre>';
                var_dump(array_keys($pages));
                echo '</pre>';
                die();
                foreach ($pages as $page) {
                    echo '<pre>';
                    var_dump($page);
                    echo '</pre>';
                    die();
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
            'https://genshin-builds.com/_next/data/'.GenshinBuildKey::DATA_KEY.'/ru/characters.json';
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
