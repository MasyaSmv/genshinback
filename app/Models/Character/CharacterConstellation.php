<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\CharacterConstellation
 *
 * @property $id
 * @property $character_id
 * @property $description
 * @property $name
 * @property $level
 */
class CharacterConstellation extends Model
{
    /**
     * @var string
     */
    public $table = 'character_constellations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'character_id',
        'description',
        'name',
        'level',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'character_id' => 'integer',
        'description' => 'string',
        'name' => 'string',
        'level' => 'integer',
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
