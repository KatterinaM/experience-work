<?php

namespace App\Entity\Cian\Base;

/**
 * Interface RoomInterface
 * @package App\Entity\Cian\Base
 */
interface RoomInterface
{
    const ROOM_TYPE = [
        self::ROOM_TYPE_BOTH,
        self::ROOM_TYPE_COMBINED,
        self::ROOM_TYPE_SEPARATE
    ];

    const ROOM_TYPE_BOTH = "both";
    const ROOM_TYPE_COMBINED = "combined";
    const ROOM_TYPE_SEPARATE = "separate";
}