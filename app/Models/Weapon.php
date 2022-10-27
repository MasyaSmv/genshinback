<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @param $name
 * @param $description
 * @param $rarity
 * @param $type
 * @param $domain
 * @param $passive
 * @param $bonus
 *
 * @property int $id
 */
class Weapon extends Model
{
    /**
     * @var string
     */
    public $table = 'weapons';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'name',
            'description',
            'rarity',
            'type',
            'domain',
            'passive',
            'bonus',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'name'        => 'string',
            'description' => 'text',
            'rarity'      => 'integer',
            'type'        => 'integer',
            'domain'      => 'string',
            'passive'     => 'string',
            'bonus'       => 'text',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;



    public const ONE_HANDED_WEAPON = 1;

    public const TWO_HANDED_WEAPON = 2;

    public const SMALL_ARMS        = 3;

    public const CATALYST          = 4;

    public const SHAFT             = 5;

    /**
     * @var array
     */
    public const TYPES_WEAPONS = [
        self::ONE_HANDED_WEAPON,
        self::TWO_HANDED_WEAPON,
        self::SMALL_ARMS,
        self::CATALYST,
        self::SHAFT,
    ];
}
