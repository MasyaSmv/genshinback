<?php

namespace App\Models\Character\Skills;

use App\Models\Character\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Character\Skills\CharacterSkillBurst
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
class CharacterSkillBurst extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skill_bursts';

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
        'level_1' => 'double',
        'level_2' => 'double',
        'level_3' => 'double',
        'level_4' => 'double',
        'level_5' => 'double',
        'level_6' => 'double',
        'level_7' => 'double',
        'level_8' => 'double',
        'level_9' => 'double',
        'level_10' => 'double',
        'level_11' => 'double',
        'level_12' => 'double',
        'level_13' => 'double',
        'level_14' => 'double',
        'level_15' => 'double',
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
