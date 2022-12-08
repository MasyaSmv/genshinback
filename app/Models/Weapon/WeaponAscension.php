<?php

namespace App\Models\Weapon;

use App\Models\Material\Material;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Weapon\WeaponAscension
 *
 * @property int $id
 * @property int $weapon_id
 * @property int $ascension
 * @property int $level
 * @property int $cost
 * @property int|null $first_material_id
 * @property int|null $second_material_id
 * @property int|null $third_material_id
 * @property-read Material|null $firstMaterial
 * @property-read Material|null $secondMaterial
 * @property-read Material|null $thirdMaterial
 * @property-read \App\Models\Weapon\Weapon|null $weapon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Weapon\Weapon[] $weapons
 * @property-read int|null $weapons_count
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension query()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereAscension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereFirstMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereSecondMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereThirdMaterialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponAscension whereWeaponId($value)
 * @mixin \Eloquent
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
    protected $fillable
        = [
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
    protected $casts
        = [
            'weapon_id'          => 'integer',
            'ascension'          => 'integer',
            'level'              => 'integer',
            'cost'               => 'integer',
            'first_material_id'  => 'integer',
            'second_material_id' => 'integer',
            'third_material_id'  => 'integer',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function firstMaterial() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Material::class, 'id', 'first_material_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function secondMaterial() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Material::class, 'id', 'second_material_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function thirdMaterial() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Material::class, 'id', 'third_material_id');
    }

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
