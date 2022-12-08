<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\CharacterPassive
 *
 * @property $id
 * @property $character_id
 * @property $level
 * @property $description
 * @property $name
 */
class CharacterPassive extends Model
{
    /**
     * @var string
     */
    public $table = 'character_passives';

    /**
     * @var string[]
     */
    protected $fillable = [
        'character_id',
        'level',
        'description',
        'name',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'character_id' => 'integer',
        'level' => 'integer',
        'description' => 'string',
        'name' => 'string',
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
