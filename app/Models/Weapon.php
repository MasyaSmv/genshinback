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
 * @method static firstWhere(string $string, mixed $name)
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
            'description' => 'string',
            'rarity'      => 'integer',
            'type'        => 'integer',
            'domain'      => 'string',
            'passive'     => 'string',
            'bonus'       => 'string',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public const ATK_POWER        = 1;

    public const PHYSICAL_DMG     = 2;

    public const MASTERY_ELEMENTS = 3;

    public const CRT_RATE         = 4;

    public const CRT_DMG          = 5;

    public const HP               = 6;

    public const ENERGY_RECOVERY  = 7;

    public const DEF              = 8;

    public const SECONDARY_STAT   = [
        self::ATK_POWER,
        self::PHYSICAL_DMG,
        self::MASTERY_ELEMENTS,
        self::CRT_RATE,
        self::CRT_DMG,
        self::HP,
        self::ENERGY_RECOVERY,
        self::DEF,
    ];

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
