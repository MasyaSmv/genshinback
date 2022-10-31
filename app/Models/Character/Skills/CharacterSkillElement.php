<?php

namespace App\Models\Character\Skills;

use App\Models\Character\Character;
use Illuminate\Database\Eloquent\Model;

class CharacterSkillElement extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skill_elements';

    /**
     * @var string[]
     */
    protected $fillable
        = [
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
    protected $casts
        = [
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function character() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }
}
