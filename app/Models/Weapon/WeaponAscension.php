<?php

namespace App\Models\Weapon;

use App\Models\Material\Material;
use Illuminate\Database\Eloquent\Model;

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
}
