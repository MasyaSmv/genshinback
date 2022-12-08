<?php

namespace App\Models\Weapon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\User
 *
 * @param $name
 * @param $description
 * @param $rarity
 * @param $type
 * @param $domain
 * @param $passive
 * @param $bonus
 * @property int $id
 * @property string $name
 * @property mixed $description
 * @property int $rarity
 * @property int $type
 * @property string $domain
 * @property string $passive
 * @property mixed $bonus
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Weapon\WeaponAscension[] $ascensions
 * @property-read int|null $ascensions_count
 * @property-read Model|\Eloquent $fullWeapon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Weapon\WeaponRefinement[] $refinements
 * @property-read int|null $refinements_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Weapon\WeaponStat[] $stats
 * @property-read int|null $stats_count
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon wherePassive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereRarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Weapon whereType($value)
 * @mixin \Eloquent
 */
class Weapon extends Model
{
    /**
     * @var string
     */
    public $table = 'weapons';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'name',
            'description',
            'rarity',
            'type',
            'domain',
            'passive',
            'bonus',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'name'        => 'string',
            'description' => 'text',
            'rarity'      => 'integer',
            'type'        => 'integer',
            'domain'      => 'string',
            'passive'     => 'string',
            'bonus'       => 'text',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public const ONE_HANDED_WEAPON = 1;

    public const TWO_HANDED_WEAPON = 2;

    public const SMALL_ARMS        = 3;

    public const CATALYST          = 4;

    public const SHAFT             = 5;

    /**
     * @var array
     */
    public const TYPES_WEAPONS = [
        self::ONE_HANDED_WEAPON,
        self::TWO_HANDED_WEAPON,
        self::SMALL_ARMS,
        self::CATALYST,
        self::SHAFT,
    ];

    /**
     * @return HasMany
     */
    public function ascensions() : HasMany
    {
        return $this->hasMany(WeaponAscension::class, 'weapon_id');
    }

    /**
     * @return HasMany
     */
    public function refinements() : HasMany
    {
        return $this->hasMany(WeaponRefinement::class, 'weapon_id');
    }

    /**
     * @return HasMany
     */
    public function stats() : HasMany
    {
        return $this->hasMany(WeaponStat::class, 'weapon_id');
    }

    /**
     * @return MorphTo
     */
    public function fullWeapon() : MorphTo
    {
        return $this->morphTo();
    }
}
