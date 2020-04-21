<?php

namespace App\Entity\Cian\Base;

/**
 * Interface OwnershipInterface
 * @package App\Entity\Cian\Base
 */
interface OwnershipInterface
{
    const ESTATE_TYPE = [
        self::ESTATE_TYPE_OWNED,
        self::ESTATE_TYPE_RENT,
    ];

    const ESTATE_TYPE_OWNED = "owned";
    const ESTATE_TYPE_RENT = "rent";
}