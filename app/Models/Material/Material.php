<?php

namespace App\Models\Material;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Material\Material
 *
 * @property int $id
 * @property string $name
 * @property int $rarity
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|Material newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Material newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Material query()
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereRarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Material whereType($value)
 * @mixin \Eloquent
 */
class Material extends Model
{
    /**
     * @var string
     */
    public $table = 'materials';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'rarity',
        'type',
    ];

    protected $casts = [
        'name'   => 'string',
        'rarity' => 'integer',
        'type'   => 'string',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    public const COMMON_MATERIALS = 1;
    public const ELEMENTAL_STONE_MATERIALS = 2;
    public const JEWELS_MATERIALS = 3;
    public const LOCAL_MATERIALS = 4;
    public const MATERIALS = 5;
    public const TALENT_LVL_UP_MATERIALS = 6;
    public const WEAPON_PRIMARY_MATERIALS = 7;
    public const WEAPON_SECONDARY_MATERIALS = 8;

}
