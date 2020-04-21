<?php

namespace App\Entity\Cian\Base;

/**
 * Interface ConditionsCommercialRealtyInterface
 * @package App\Entity\Cian\Base
 */
interface ConditionsCommercialRealtyInterface
{
    const LAYOUT = [
        self::LAYOUT_CABINET,
        self::LAYOUT_CORRIDORPLAN,
        self::LAYOUT_MIXED,
        self::LAYOUT_OPEN_SPACE
    ];

    const LAYOUT_CABINET = "cabinet";
    const LAYOUT_CORRIDORPLAN = "corridorplan";
    const LAYOUT_MIXED = "mixed";
    const LAYOUT_OPEN_SPACE = "openSpace";

    const INPUT_TYPE = [
        self::INPUT_TYPE_COMMON_FROM_STREET,
        self::INPUT_TYPE_COMMON_FROM_YARD,
        self::INPUT_TYPE_SEPARATE_FROM_STREET,
        self::INPUT_TYPE_SEPARATE_FROM_YARD
    ];

    const INPUT_TYPE_COMMON_FROM_STREET = "commonFromStreet";
    const INPUT_TYPE_COMMON_FROM_YARD = "commonFromYard";
    const INPUT_TYPE_SEPARATE_FROM_STREET = "separateFromStreet";
    const INPUT_TYPE_SEPARATE_FROM_YARD = "separateFromYard";

    const DRIVEWAY_TYPE = [
        self::DRIVEWAY_TYPE_ASPHALT,
        self::DRIVEWAY_TYPE_GROUND,
        self::DRIVEWAY_TYPE_NO,
    ];

    const DRIVEWAY_TYPE_ASPHALT = "asphalt";
    const DRIVEWAY_TYPE_GROUND = "ground";
    const DRIVEWAY_TYPE_NO = "NO";

    const FURNITURE_PRESENCE = [
        self::FURNITURE_PRESENCE_NO,
        self::FURNITURE_PRESENCE_YES,
    ];

    const FURNITURE_PRESENCE_NO = "no";
    const FURNITURE_PRESENCE_YES = "yes";

    const FLOOR_MATERIAL_TYPE_TYPE = [
        self::FLOOR_MATERIAL_TYPE_TYPE_ASPHALT,
        self::FLOOR_MATERIAL_TYPE_TYPE_CONCRETE,
        self::FLOOR_MATERIAL_TYPE_TYPE_LAMINATE,
        self::FLOOR_MATERIAL_TYPE_TYPE_LINOLEUM,
        self::FLOOR_MATERIAL_TYPE_TYPE_POLYMERIC,
        self::FLOOR_MATERIAL_TYPE_TYPE_REINFORCED_CONCRETE,
        self::FLOOR_MATERIAL_TYPE_TYPE_SELF_LEVELING,
        self::FLOOR_MATERIAL_TYPE_TYPE_TILE,
        self::FLOOR_MATERIAL_TYPE_TYPE_WOOD
    ];

    const FLOOR_MATERIAL_TYPE_TYPE_ASPHALT = "asphalt";
    const FLOOR_MATERIAL_TYPE_TYPE_CONCRETE = "concrete";
    const FLOOR_MATERIAL_TYPE_TYPE_LAMINATE = "laminate";
    const FLOOR_MATERIAL_TYPE_TYPE_LINOLEUM = "linoleum";
    const FLOOR_MATERIAL_TYPE_TYPE_POLYMERIC = "polymeric";
    const FLOOR_MATERIAL_TYPE_TYPE_REINFORCED_CONCRETE = "reinforcedConcrete";
    const FLOOR_MATERIAL_TYPE_TYPE_SELF_LEVELING = "selfLeveling";
    const FLOOR_MATERIAL_TYPE_TYPE_TILE = "tile";
    const FLOOR_MATERIAL_TYPE_TYPE_WOOD = "wood";
}