<?php

namespace App\Console\Commands;

use App\Models\Material;
use Database\Seeders\MaterialSeed;
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
    protected $description = 'Command description';

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
                'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru/character/' .
                $urlId . '.json?name=' . $urlId;

            $ch = curl_init($aUrl);

            curl_setopt(
                $ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']
            );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $data = object_to_array(json_decode($response));

            echo '<pre>';
            var_dump(array_keys($data['pageProps']));
            echo '</pre>';
            die();

            foreach ($data as $pages) {
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
            'https://genshin-builds.com/_next/data/lfreU0wqEJsvr_wQLr9kP/ru/characters.json';
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
