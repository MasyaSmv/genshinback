<?php

namespace App\Models\Material;

use Illuminate\Database\Eloquent\Model;

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

}
