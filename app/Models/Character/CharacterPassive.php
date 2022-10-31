<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

class CharacterPassive extends Model
{
    /**
     * @var string
     */
    public $table = 'character_passives';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'character_id',
            'level',
            'description',
            'name',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
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
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function character() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Character::class, 'id', 'character_id');
    }
}
