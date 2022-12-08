<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\CharacterAscension
 *
 * @property-read \App\Models\Character\Character|null $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAscension newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAscension newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAscension query()
 * @mixin \Eloquent
 */
class CharacterAscension extends Model
{
    /**
     * @var string
     */
    public $table = 'character_ascensions';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'character_id',
            'ascension',
            'cost',
            'level',
            'first_material_id',
            'second_material_id',
            'third_material_id',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'character_id' => 'integer',
            'ascension' => 'integer',
            'cost' => 'integer',
            'level' => 'integer',
            'first_material_id' => 'integer',
            'second_material_id' => 'integer',
            'third_material_id' => 'integer',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function character() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }
}
