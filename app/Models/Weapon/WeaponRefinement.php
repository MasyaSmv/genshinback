<?php

namespace App\Models\Weapon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Weapon\WeaponRefinement
 *
 * @property $id
 * @property $weapon_id
 * @property $refinement
 * @property $description
 */
class WeaponRefinement extends Model
{
    /**
     * @var string
     */
    public $table = 'weapon_refinements';

    /**
     * @var string[]
     */
    protected $fillable = [
        'weapon_id',
        'refinement',
        'description',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'weapon_id' => 'integer',
        'refinement' => 'string',
        'description' => 'text',
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
