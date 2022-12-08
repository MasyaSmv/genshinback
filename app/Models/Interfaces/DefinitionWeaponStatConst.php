<?php

namespace App\Models\Interfaces;

/**
 * Interfaces
 */
interface DefinitionWeaponStatConst
{
    public const ATK_POWER = 1;
    public const PHYSICAL_DMG = 2;
    public const MASTERY_ELEMENTS = 3;
    public const CRT_RATE = 4;
    public const CRT_DMG = 5;
    public const HP = 6;
    public const ENERGY_RECOVERY = 7;
    public const DEF = 8;

    public const SECONDARY_STAT = [
        self::ATK_POWER,
        self::PHYSICAL_DMG,
        self::MASTERY_ELEMENTS,
        self::CRT_RATE,
        self::CRT_DMG,
        self::HP,
        self::ENERGY_RECOVERY,
        self::DEF,
    ];
}
