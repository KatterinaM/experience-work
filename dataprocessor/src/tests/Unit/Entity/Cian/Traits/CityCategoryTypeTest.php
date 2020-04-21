<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Traits\CityCategoryType;
use PHPUnit\Framework\TestCase;

/**
 * Class CityCategoryTypeTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class CityCategoryTypeTest extends TestCase
{
    private $class;

    public function testAvailableCategoryTypes()
    {
        /** @var CityCategoryType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            CategoryInterface::CITY_CATEGORY_FLAT_RENT,
            CategoryInterface::CITY_CATEGORY_BED_RENT,
            CategoryInterface::CITY_CATEGORY_ROOM_RENT,
            CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
            CategoryInterface::CITY_CATEGORY_FLAT_SALE,
            CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
            CategoryInterface::CITY_CATEGORY_ROOM_SALE,
        ], $ad->getAvailableCategoryTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use CityCategoryType;
        };
    }
}