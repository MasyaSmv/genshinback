<?php

namespace App\Models\Weapon;

use App\Models\Interfaces\DefinitionWeaponStatConst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Weapon\WeaponStat
 *
 * @property $id
 * @property $weapon_id
 * @property $ascension
 * @property $level
 * @property $base_atk
 * @property $secondary_id
 */
class WeaponStat extends Model implements DefinitionWeaponStatConst
{
    /**
     * @var string
     */
    public $table = 'weapon_stats';

    /**
     * @var string[]
     */
    protected $fillable = [
        'weapon_id',
        'ascension',
        'level',
        'base_atk',
        'secondary_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'weapon_id' => 'integer',
        'ascension' => 'integer',
        'level' => 'integer',
        'base_atk' => 'integer',
        'secondary_id' => 'integer',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function weapon(): HasOne
    {
        return $this->hasOne(Weapon::class, 'id', 'weapon_id');
    }

    /**
     * @return MorphMany
     */
    public function weapons(): MorphMany
    {
        return $this->morphMany(Weapon::class, 'fullWeapon');
    }
}
