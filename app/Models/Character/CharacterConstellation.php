<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

class CharacterConstellation extends Model
{
    /**
     * @var string
     */
    public $table = 'character_constellations';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'character_id',
            'description',
            'name',
            'level',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'character_id' => 'integer',
            'description'  => 'string',
            'name'         => 'string',
            'level'        => 'integer',
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
