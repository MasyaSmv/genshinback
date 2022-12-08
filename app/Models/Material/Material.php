<?php

namespace App\Models\Material;

use App\Models\Interfaces\DefinitionMaterialConst;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Material\Material
 *
 * @property $id
 * @property $name
 * @property $rarity
 * @property $type
 */
class Material extends Model implements DefinitionMaterialConst
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
}
