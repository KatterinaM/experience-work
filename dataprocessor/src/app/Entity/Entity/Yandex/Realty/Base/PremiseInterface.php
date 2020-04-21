<?php

namespace App\Entity\Yandex\Realty\Base;

/**
 * Interface PremiseInterface
 * @package App\Entity\Yandex\Realty\Base
 */
interface PremiseInterface
{
    const ENTRANCE_TYPE_COMMON = 'common';
    const ENTRANCE_TYPE_SEPARATE = 'separate';

    const ENTRANCE_TYPES = [
        self::ENTRANCE_TYPE_COMMON,
        self::ENTRANCE_TYPE_SEPARATE,
    ];

    const FLOOR_COVERING_CARPET = 'ковролин';
    const FLOOR_COVERING_LAMINATE = 'ламинат';
    const FLOOR_COVERING_LINOLEUM  = 'линолеум';
    const FLOOR_COVERING_PARQUET = 'паркет';

    const FLOOR_COVERINGS = [
        self::FLOOR_COVERING_CARPET,
        self::FLOOR_COVERING_LAMINATE,
        self::FLOOR_COVERING_LINOLEUM,
        self::FLOOR_COVERING_PARQUET,
    ];

    const WINDOW_TYPE_SHOWCASE = 'витринные';
    const WINDOW_TYPE_SMALL = 'маленькие';
    const WINDOW_TYPE_NORMAL = 'обычные';

    const WINDOW_TYPES = [
        self::WINDOW_TYPE_SHOWCASE,
        self::WINDOW_TYPE_SMALL,
        self::WINDOW_TYPE_NORMAL,
    ];

    const WINDOW_VIEW_COURTYARD = 'во двор';
    const WINDOW_VIEW_STREET = 'на улицу';

    const WINDOW_VIEWS = [
        self::WINDOW_VIEW_COURTYARD,
        self::WINDOW_VIEW_STREET,
    ];
}
