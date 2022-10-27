<?php

namespace App\Helpers\Weapon;


use App\Models\Weapon;
use App\Models\WeaponStat;

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

    /**
     * @param $type
     *
     * @return int|void
     */
    public static function typeSecondaryStat($type)
    {
        switch ($type) {
            case'Сила атаки%':
                return WeaponStat::ATK_POWER;

            case'HP%':
                return WeaponStat::HP;

            case'Крит. урон':
                return WeaponStat::CRT_DMG;

            case'Шанс крит. попадания':
                return WeaponStat::CRT_RATE;

            case'Бонус физ. урона':
                return WeaponStat::PHYSICAL_DMG;

            case'Мастерство стихий':
                return WeaponStat::MASTERY_ELEMENTS;

            case'Восст. энергии':
                return WeaponStat::ENERGY_RECOVERY;

            case'Защита%':
                return WeaponStat::DEF;
        }
    }

}