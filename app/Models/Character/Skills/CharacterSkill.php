<?php

namespace App\Models\Character\Skills;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\CharacterSkill
 *
 * @property $id
 * @property $character_id
 * @property $description
 * @property $info
 * @property $name
 */
class CharacterSkill extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skills';

    /**
     * @var string[]
     */
    protected $fillable = [
        'character_id',
        'description',
        'info',
        'name',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'character_id' => 'integer',
        'description' => 'text',
        'info' => 'text',
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
