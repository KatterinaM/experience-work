<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait CommercialCategoryType
 * @package App\Entity\Cian\Traits
 */
trait CommercialCategoryType
{
    use BaseCategoryType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableCategoryTypes(): array
    {
        return [
            CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
        ];
    }
}