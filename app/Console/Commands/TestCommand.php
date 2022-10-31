<?php

namespace App\Console\Commands;

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
        $photo = Weapon::find(1);

        $imageable = $photo->fullWeapon;

        echo '<pre>';
        var_dump($photo);
        echo '</pre>';
        die();
    }

}
