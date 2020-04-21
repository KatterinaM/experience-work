<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait CityCategoryType
 * @package App\Entity\Cian\Traits
 */
trait CityCategoryType
{
    use BaseCategoryType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableCategoryTypes(): array
    {
        return [
            CategoryInterface::CITY_CATEGORY_FLAT_RENT,
            CategoryInterface::CITY_CATEGORY_BED_RENT,
            CategoryInterface::CITY_CATEGORY_ROOM_RENT,
            CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
            CategoryInterface::CITY_CATEGORY_FLAT_SALE,
            CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
            CategoryInterface::CITY_CATEGORY_ROOM_SALE,
        ];
    }

}