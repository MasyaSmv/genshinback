<?php

namespace App\Models\Interfaces;

/**
 * Interfaces
 */
interface DefinitionWeaponConst
{
    public const ONE_HANDED_WEAPON = 1;
    public const TWO_HANDED_WEAPON = 2;
    public const SMALL_ARMS = 3;
    public const CATALYST = 4;
    public const SHAFT = 5;

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
}
