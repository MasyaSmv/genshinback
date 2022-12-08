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
     * @return void
     */
    public function handle(): void
    {

    }

}
