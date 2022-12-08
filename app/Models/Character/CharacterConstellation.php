<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\CharacterConstellation
 *
 * @property int $id
 * @property int $character_id
 * @property string $description
 * @property string $name
 * @property int $level
 * @property-read \App\Models\Character\Character|null $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterConstellation whereName($value)
 * @mixin \Eloquent
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
