<?php

namespace App\Entity\Avito\Base;

/**
 * Interface HouseTypeInterface
 * @package App\Entity\Avito\Base
 */
interface HouseTypeInterface
{
    const AVAILABLE_TYPES = [
        'Кирпичный',
        'Панельный',
        'Блочный',
        'Монолитный',
        'Деревянный',
    ];
}
