<?php

namespace App\Helpers\Characters;

use App\Models\Interfaces\DefinitionCharacterConst;

class CharacterSwitches
{
    /**
     * @param $type
     * @return int|void
     */
    public static function typeElement($type)
    {
        switch ($type)
        {
            case 'Гео':
                return DefinitionCharacterConst::GEO;
            case 'Крио':
                return DefinitionCharacterConst::CRYO;
            case 'Пиро':
                return DefinitionCharacterConst::PIRO;
            case 'Гидро':
                return DefinitionCharacterConst::GIDRO;
            case 'Дендро':
                return DefinitionCharacterConst::DENDRO;
            case 'Электро':
                return DefinitionCharacterConst::ELECTRO;
            case 'Анемо':
                return DefinitionCharacterConst::ANEMO;
        }
    }

    /**
     * @param $type
     * @return int|void
     */
    public static function typeGender($type)
    {
        switch ($type)
        {
            case 'мужчина':
                return DefinitionCharacterConst::MALE;
            case 'женский':
                return DefinitionCharacterConst::FEMALE;
        }
    }

    /**
     * @param $type
     * @return int|void
     */
    public static function typeRegion($type)
    {
        switch ($type)
        {
            case 'Мондштадт':
                return DefinitionCharacterConst::MONDSHTAT;
            case 'Ли Юэ':
                return DefinitionCharacterConst::LI_YUE;
            case 'Инадзума':
                return DefinitionCharacterConst::INADZUMA;
            case 'Сумеру':
                return DefinitionCharacterConst::SUMERU;
        }
    }

    /**
     * @param $type
     * @return int|void
     */
    public static function typeSubStat($type)
    {
        switch ($type)
        {
            case 'Сила атаки%':
                return DefinitionCharacterConst::ATK_POWER;
            case 'Бонус физ. урона':
                return DefinitionCharacterConst::PHYSICAL_DMG;
            case 'Мастерство стихий':
                return DefinitionCharacterConst::MASTERY_ELEMENTS;
            case 'Шанс крит. попадания':
                return DefinitionCharacterConst::CRT_RATE;
            case 'Крит. урон':
                return DefinitionCharacterConst::CRT_DMG;
            case 'HP%':
                return DefinitionCharacterConst::HP;
            case 'Защита%':
                return DefinitionCharacterConst::DEF;
            case 'Бонус лечения':
                return DefinitionCharacterConst::HEAL_BONUS;
            case 'Восст. энергии':
                return DefinitionCharacterConst::ENERGY_RECOVERY;
            case 'Бонус Крио урона':
                return DefinitionCharacterConst::BONUS_CRYO_DMG;
            case 'Бонус Пиро урона':
                return DefinitionCharacterConst::BONUS_PIRO_DMG;
            case 'Бонус Гидро урона':
                return DefinitionCharacterConst::BONUS_GIDRO_DMG;
            case 'Бонус Электро урона':
                return DefinitionCharacterConst::BONUS_ELECTRO_DMG;
            case 'Бонус Анемо урона':
                return DefinitionCharacterConst::BONUS_ANEMO_DMG;
            case 'Бонус Дендро урона':
                return DefinitionCharacterConst::BONUS_DENDRO_DMG;
            case 'Бонус Гео урона':
                return DefinitionCharacterConst::BONUS_GEO_DMG;
        }
    }
}
