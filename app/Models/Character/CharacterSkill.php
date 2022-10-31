<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

class CharacterSkill extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skills';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'character_id',
            'description',
            'info',
            'name',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'character_id' => 'integer',
            'description' => 'string',
            'info' => 'string',
            'name' => 'string',
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
