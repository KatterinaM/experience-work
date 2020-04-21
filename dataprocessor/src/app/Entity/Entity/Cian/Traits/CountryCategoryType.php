<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait CountryCategoryType
 * @package App\Entity\Cian\Traits
 */
trait CountryCategoryType
{
    use BaseCategoryType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableCategoryTypes(): array
    {
        return [
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
        ];
    }

}