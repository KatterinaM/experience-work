<?php

namespace App\Entity\Yandex\Realty\Base;

/**
 * Interface BuildingInterface
 * @package App\Entity\Yandex\Realty\Base
 */
interface BuildingInterface
{
    const OFFICE_CLASS_A = 'A';
    const OFFICE_CLASS_APLUS = 'A+';
    const OFFICE_CLASS_B = 'B';
    const OFFICE_CLASS_BPLUS = 'B+';
    const OFFICE_CLASS_C = 'C';
    const OFFICE_CLASS_CPLUS = 'C+';

    const OFFICE_CLASSES = [
        self::OFFICE_CLASS_A,
        self::OFFICE_CLASS_APLUS,
        self::OFFICE_CLASS_B,
        self::OFFICE_CLASS_BPLUS,
        self::OFFICE_CLASS_C,
        self::OFFICE_CLASS_CPLUS,
    ];
}