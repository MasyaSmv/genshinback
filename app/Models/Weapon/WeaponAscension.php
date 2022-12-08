<?php

namespace App\Models\Weapon;

use App\Models\Material\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Weapon\WeaponAscension
 *
 * @property $id
 * @property $weapon_id
 * @property $ascension
 * @property $level
 * @property $cost
 * @property $first_material_id
 * @property $second_material_id
 * @property $third_material_id
 */
class WeaponAscension extends Model
{
    /**
     * @var string
     */
    public $table = 'weapon_ascensions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'weapon_id',
        'ascension',
        'level',
        'cost',
        'first_material_id',
        'second_material_id',
        'third_material_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'weapon_id' => 'integer',
        'ascension' => 'integer',
        'level' => 'integer',
        'cost' => 'integer',
        'first_material_id' => 'integer',
        'second_material_id' => 'integer',
        'third_material_id' => 'integer',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function firstMaterial(): HasOne
    {
        return $this->hasOne(Material::class, 'id', 'first_material_id');
    }

    /**
     * @return HasOne
     */
    public function secondMaterial(): HasOne
    {
        return $this->hasOne(Material::class, 'id', 'second_material_id');
    }

    /**
     * @return HasOne
     */
    public function thirdMaterial(): HasOne
    {
        return $this->hasOne(Material::class, 'id', 'third_material_id');
    }

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
