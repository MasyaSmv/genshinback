<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\CharacterPassive
 *
 * @property int $id
 * @property int $character_id
 * @property int $level
 * @property string $description
 * @property string $name
 * @property-read \App\Models\Character\Character|null $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterPassive whereName($value)
 * @mixin \Eloquent
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
