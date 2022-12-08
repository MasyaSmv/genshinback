<?php

namespace App\Models\Weapon;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Weapon\WeaponRefinement
 *
 * @property int $id
 * @property int $weapon_id
 * @property string $refinement
 * @property mixed $description
 * @property-read \App\Models\Weapon\Weapon|null $weapon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Weapon\Weapon[] $weapons
 * @property-read int|null $weapons_count
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement query()
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement whereRefinement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WeaponRefinement whereWeaponId($value)
 * @mixin \Eloquent
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
    protected $fillable
        = [
            'weapon_id',
            'refinement',
            'description',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'weapon_id'   => 'integer',
            'refinement' => 'string',
            'description' => 'text',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

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
