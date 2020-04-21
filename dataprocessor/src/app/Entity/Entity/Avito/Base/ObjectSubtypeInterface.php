<?php

namespace App\Entity\Avito\Base;

/**
 * Interface ObjectSubtypeInterface
 * @package App\Entity\Avito\Base
 */
interface ObjectSubtypeInterface
{
    const OBJECT_SUBTYPE_GARAGE_BUILDING_CONCRETE = 'Железобетонный';
    const OBJECT_SUBTYPE_GARAGE_BUILDING_BRICK = 'Кирпичный';
    const OBJECT_SUBTYPE_GARAGE_BUILDING_METAL = 'Металлический';

    const OBJECT_SUBTYPE_GARAGE_SPACE_MULTI_LEVEL = 'Многоуровневый паркинг';
    const OBJECT_SUBTYPE_GARAGE_SPACE_UNDERGROUND = 'Подземный паркинг';
    const OBJECT_SUBTYPE_GARAGE_SPACE_CLOSED = 'Крытая стоянка';
    const OBJECT_SUBTYPE_GARAGE_SPACE_OPEN = 'Открытая стоянка';
}
