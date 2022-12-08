<?php

namespace App\Models\Character;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\CharacterSkill
 *
 * @property int $id
 * @property int $character_id
 * @property string $description
 * @property string $info
 * @property string $name
 * @property-read \App\Models\Character\Character|null $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkill whereName($value)
 * @mixin \Eloquent
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
