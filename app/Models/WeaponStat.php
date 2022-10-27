<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponStat extends Model
{
    /**
     * @var string
     */
    public $table = 'weapon_stats';

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'weapon_id',
            'ascension',
            'level',
            'base_atk',
            'secondary_id',
        ];

    /**
     * @var string[]
     */
    protected $casts
        = [
            'weapon_id'    => 'integer',
            'ascension'    => 'integer',
            'level'        => 'integer',
            'base_atk'     => 'integer',
            'secondary_id' => 'integer',
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
