<?php

namespace App\Entity\Cian\Base;

/**
 * Interface ConditionsCountryRealtyInterface
 * @package App\Entity\Cian\Base
 */
interface ConditionsCountryRealtyInterface
{
    const WC_LOCATION_TYPE = [
        self::WC_LOCATION_TYPE_INDOORS,
        self::WC_LOCATION_TYPE_OUTDOORS
    ];

    const WC_LOCATION_TYPE_INDOORS = "indoors";
    const WC_LOCATION_TYPE_OUTDOORS = "outdoors";
}