<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\Character
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @mixin \Eloquent
 */
class Character extends Model
{
    /**
     * @var string
     */
    public $table = 'character';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'name',
            'affiliation',
            'constellation',
            'description',
            'domain',
            'element_id',
            'gender_id',
            'rarity',
            'substat_id',
            'title',
            'weapon_type_id',
            'icon',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'name'           => 'string',
            'affiliation'    => 'string',
            'constellation'  => 'string',
            'description'    => 'string',
            'domain'         => 'string',
            'element_id'     => 'integer',
            'gender_id'      => 'integer',
            'rarity'         => 'integer',
            'substat_id'     => 'integer',
            'title'          => 'string',
            'weapon_type_id' => 'integer',
            'icon'           => 'string',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public const MALE              = 1;

    public const FEMALE            = 2;

    public const GENDER            = [
        self::MALE,
        self::FEMALE,
    ];

    public const CRYO              = 1;

    public const PIRO              = 2;

    public const GIDRO             = 3;

    public const ELECTRO           = 4;

    public const ANEMO             = 5;

    public const DENDRO            = 6;

    public const GEO               = 7;

    public const ELEMENT_TYPES     = [
        self::CRYO,
        self::PIRO,
        self::GIDRO,
        self::ELECTRO,
        self::ANEMO,
        self::DENDRO,
        self::GEO,
    ];

    public const ATK_POWER         = 1;

    public const PHYSICAL_DMG      = 2;

    public const MASTERY_ELEMENTS  = 3;

    public const CRT_RATE          = 4;

    public const CRT_DMG           = 5;

    public const HP                = 6;

    public const ENERGY_RECOVERY   = 7;

    public const BONUS_CRYO_DMG    = 8;

    public const BONUS_PIRO_DMG    = 9;

    public const BONUS_GIDRO_DMG   = 10;

    public const BONUS_ELECTRO_DMG = 11;

    public const BONUS_ANEMO_DMG   = 12;

    public const BONUS_DENDRO_DMG  = 13;

    public const BONUS_GEO_DMG     = 14;

    public const SUBSTAT_TYPES     = [
        self::ATK_POWER,
        self::PHYSICAL_DMG,
        self::MASTERY_ELEMENTS,
        self::CRT_RATE,
        self::CRT_DMG,
        self::HP,
        self::ENERGY_RECOVERY,
        self::BONUS_CRYO_DMG,
        self::BONUS_PIRO_DMG,
        self::BONUS_GIDRO_DMG,
        self::BONUS_ELECTRO_DMG,
        self::BONUS_ANEMO_DMG,
        self::BONUS_DENDRO_DMG,
        self::BONUS_GEO_DMG,
    ];

}
