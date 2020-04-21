<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Traits\CountryCategoryType;
use PHPUnit\Framework\TestCase;

class CountryCategoryTypeTest extends TestCase
{
    private $class;

    public function testAvailableCategoryTypes()
    {
        /** @var CountryCategoryType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
            CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
            CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
        ], $ad->getAvailableCategoryTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use CountryCategoryType;
        };
    }
}