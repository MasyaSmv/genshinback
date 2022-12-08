<?php

namespace App\Helpers\Materials;

use App\Models\Material\Material;

class MaterialSwitches
{
    /**
     * @param $type
     * @return int|void
     */
    public static function typeMaterial($type)
    {
        switch ($type)
        {
            case 'common_materials':
                return Material::COMMON_MATERIALS;
            case 'elemental_stone_materials':
                return Material::ELEMENTAL_STONE_MATERIALS;
            case 'jewels_materials':
                return Material::JEWELS_MATERIALS;
            case 'local_materials':
                return Material::LOCAL_MATERIALS;
            case 'materials':
                return Material::MATERIALS;
            case 'talent_lvl_up_materials':
                return Material::TALENT_LVL_UP_MATERIALS;
            case 'weapon_primary_materials':
                return Material::WEAPON_PRIMARY_MATERIALS;
            case 'weapon_secondary_materials':
                return Material::WEAPON_SECONDARY_MATERIALS;
        }
    }
}
