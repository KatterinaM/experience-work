<?php

namespace App\Entity\Cian\Base;

/**
 * Interface InfrastructureTypeInterface
 * @package App\Entity\Cian\Base
 */
interface InfrastructureInterface
{
    const REPAIR_TYPE_COSMETIC = 'cosmetic';
    const REPAIR_TYPE_DESIGN= 'design';
    const REPAIR_TYPE_EURO= 'euro';
    const REPAIR_TYPE_NO= 'no';

    const REPAIR_TYPE = [
        self::REPAIR_TYPE_COSMETIC,
        self::REPAIR_TYPE_DESIGN,
        self::REPAIR_TYPE_EURO,
        self::REPAIR_TYPE_NO,
    ];




}