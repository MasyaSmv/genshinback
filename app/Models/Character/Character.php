<?php

namespace App\Models\Character;

use App\Models\Interfaces\DefinitionCharacterConst;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $name
 * @property $affiliation
 * @property $constellation
 * @property $description
 * @property $domain
 * @property $element_id
 * @property $gender_id
 * @property $rarity
 * @property $substat_id
 * @property $title
 * @property $weapon_type_id
 * @property $icon
 */
class Character extends Model implements DefinitionCharacterConst
{
    /**
     * @var string
     */
    public $table = 'characters';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'affiliation',
        'constellation',
        'description',
        'domain',
        'element_id',
        'gender_id',
        'rarity',
        'substat_id',
        'title',
        'weapon_type_id',
        'region_id',
        'icon',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'string',
        'affiliation' => 'string',
        'constellation' => 'string',
        'description' => 'text',
        'domain' => 'string',
        'element_id' => 'integer',
        'gender_id' => 'integer',
        'rarity' => 'integer',
        'substat_id' => 'integer',
        'title' => 'string',
        'weapon_type_id' => 'integer',
        'region_id' => 'integer',
        'icon' => 'string',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
