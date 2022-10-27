<?php

namespace App\Helpers\Weapon;


use App\Models\Weapon;

class WeaponSwitches
{
    /**
     * @param $type
     *
     * @return int|void
     */
    public static function typeWeapon($type)
    {
        switch ($type) {
            case'Двуручное оружие':
                return Weapon::TWO_HANDED_WEAPON;

            case'Одноручное оружие':
                return Weapon::ONE_HANDED_WEAPON;

            case'Катализатор оружие':
                return Weapon::CATALYST;

            case'Древковое оружие':
                return Weapon::SHAFT;

            case'Стрелковое оружие':
                return Weapon::SMALL_ARMS;
        }
    }

}