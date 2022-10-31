<?php

namespace App\Models\Weapon;

use Illuminate\Database\Eloquent\Model;

class WeaponStat extends Model
{
    /**
     * @var string
     */
    public $table = 'weapon_stats';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'weapon_id',
            'ascension',
            'level',
            'base_atk',
            'secondary_id',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'weapon_id'    => 'integer',
            'ascension'    => 'integer',
            'level'        => 'integer',
            'base_atk'     => 'integer',
            'secondary_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function weapon() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Weapon::class, 'id', 'weapon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function weapons() : \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Weapon::class, 'fullWeapon');
    }
}
