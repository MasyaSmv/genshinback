<?php

namespace App\Models\Weapon;

use App\Models\Interfaces\DefinitionWeaponConst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property $name
 * @property $description
 * @property $rarity
 * @property $type
 * @property $domain
 * @property $passive
 * @property $bonus
 */
class Weapon extends Model implements DefinitionWeaponConst
{
    /**
     * @var string
     */
    public $table = 'weapons';

    /**
     * @var string[]
     */
    protected $fillable = [
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
    protected $casts = [
        'name' => 'string',
        'description' => 'text',
        'rarity' => 'integer',
        'type' => 'integer',
        'domain' => 'string',
        'passive' => 'string',
        'bonus' => 'text',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function ascensions(): HasMany
    {
        return $this->hasMany(WeaponAscension::class, 'weapon_id');
    }

    /**
     * @return HasMany
     */
    public function refinements(): HasMany
    {
        return $this->hasMany(WeaponRefinement::class, 'weapon_id');
    }

    /**
     * @return HasMany
     */
    public function stats(): HasMany
    {
        return $this->hasMany(WeaponStat::class, 'weapon_id');
    }

    /**
     * @return MorphTo
     */
    public function fullWeapon(): MorphTo
    {
        return $this->morphTo();
    }
}
