<?php

namespace App\Models\Character\Skills;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\CharacterAscension
 *
 * @property $character_id
 * @property $ascension
 * @property $cost
 * @property $level
 * @property $first_material_id
 * @property $second_material_id
 * @property $third_material_id
 * @property $fourth_material_id
 */
class CharacterTalentMaterial extends Model
{
    /**
     * @var string
     */
    public $table = 'character_talent_materials';

    /**
     * @var string[]
     */
    protected $fillable = [
        'character_id',
        'level',
        'cost',
        'first_material_id',
        'second_material_id',
        'third_material_id',
        'fourth_material_id',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'character_id' => 'integer',
        'level' => 'integer',
        'cost' => 'integer',
        'first_material_id' => 'integer',
        'second_material_id' => 'integer',
        'third_material_id' => 'integer',
        'fourth_material_id' => 'integer',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function character(): HasOne
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }
}
