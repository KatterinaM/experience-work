<?php

namespace App\Entity\Cian\Base;

/**
 * Interface ConditionsCityRealtyInterface
 * @package App\Entity\Cian\Base
 */
interface ConditionsCityRealtyInterface
{
    const WINDOWS_VIEW_TYPE = [
        self::WINDOWS_VIEW_TYPE_STREET,
        self::WINDOWS_VIEW_TYPE_YARD,
        self::WINDOWS_VIEW_TYPE_YARD_AND_STREET
    ];

    const WINDOWS_VIEW_TYPE_STREET = "street";
    const WINDOWS_VIEW_TYPE_YARD = "yard";
    const WINDOWS_VIEW_TYPE_YARD_AND_STREET = "yardAndStreet";
}