<?php

namespace App\Models\Character\Skills;

use App\Models\Character\Character;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character\Skills\CharacterSkillBurst
 *
 * @property int $id
 * @property int $character_id
 * @property string $name
 * @property float $level_1
 * @property float $level_2
 * @property float $level_3
 * @property float $level_4
 * @property float $level_5
 * @property float $level_6
 * @property float $level_7
 * @property float $level_8
 * @property float $level_9
 * @property float $level_10
 * @property float $level_11
 * @property float $level_12
 * @property float $level_13
 * @property float $level_14
 * @property float $level_15
 * @property-read Character|null $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel11($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel14($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel15($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereLevel9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterSkillBurst whereName($value)
 * @mixin \Eloquent
 */
class CharacterSkillBurst extends Model
{
    /**
     * @var string
     */
    public $table = 'character_skill_burst';

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
