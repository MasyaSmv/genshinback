<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    /**
     * @var string
     */
    public $table = 'heroes';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'name',
            'weapon_type',
            'element',
            'lvl_stat',
            'atk_talent',
            'element_skill_talent',
            'element_burst_talent',
            'first_passive_talent',
            'second_passive_talent',
            'icon',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'name'                  => 'string',
            'weapon_type'           => 'string',
            'element'               => 'string',
            'lvl_stat'              => 'string',
            'atk_talent'            => 'string',
            'element_skill_talent'  => 'string',
            'element_burst_talent'  => 'string',
            'first_passive_talent'  => 'string',
            'second_passive_talent' => 'string',
            'icon'                  => 'string',
        ];



}
