<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponRefinement extends Model
{
    /**
     * @var string
     */
    public $table = 'weapon_refinements';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'weapon_id',
            'refinement',
            'description',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'weapon_id'   => 'integer',
            'refinement' => 'string',
            'description' => 'text',
        ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function weapon() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Weapon::class, 'id', 'weapon_id');
    }

}
