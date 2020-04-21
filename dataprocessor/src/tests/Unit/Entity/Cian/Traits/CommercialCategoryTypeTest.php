<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Traits\CommercialCategoryType;
use PHPUnit\Framework\TestCase;

/**
 * Class CommercialCategoryTypeTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class CommercialCategoryTypeTest extends TestCase
{
    private $class;

    public function testAvailableCategoryTypes()
    {
        /** @var CommercialCategoryType $ad */
        $ad = new $this->class;

        $this->assertEquals([
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
        ], $ad->getAvailableCategoryTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use CommercialCategoryType;
        };
    }
}