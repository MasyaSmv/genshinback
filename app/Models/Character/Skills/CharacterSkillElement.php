<?php

namespace App\Models\Character\Skills;

use App\Models\Character\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\Skills\CharacterSkillElement
 *
 * @property $id
 * @property $character_id
 * @property $name
 * @property $level_1
 * @property $level_2
 * @property $level_3
 * @property $level_4
 * @property $level_5
 * @property $level_6
 * @property $level_7
 * @property $level_8
 * @property $level_9
 * @property $level_10
 * @property $level_11
 * @property $level_12
 * @property $level_13
 * @property $level_14
 * @property $level_15
 */
class CharacterSkillElement extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skill_elements';

    /**
     * @var string[]
     */
    protected $fillable = [
        'character_id',
        'name',
        'level_1',
        'level_2',
        'level_3',
        'level_4',
        'level_5',
        'level_6',
        'level_7',
        'level_8',
        'level_9',
        'level_10',
        'level_11',
        'level_12',
        'level_13',
        'level_14',
        'level_15',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'character_id' => 'integer',
        'name' => 'string',
        'level_1' => 'string',
        'level_2' => 'string',
        'level_3' => 'string',
        'level_4' => 'string',
        'level_5' => 'string',
        'level_6' => 'string',
        'level_7' => 'string',
        'level_8' => 'string',
        'level_9' => 'string',
        'level_10' => 'string',
        'level_11' => 'string',
        'level_12' => 'string',
        'level_13' => 'string',
        'level_14' => 'string',
        'level_15' => 'string',
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
