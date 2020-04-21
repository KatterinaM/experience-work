<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Traits\TotalArea;
use App\Tests\Unit\Entity\ValidationTestCase;

class TotalAreaTest extends ValidationTestCase
{
    private $class;

//    /**
//     * @dataProvider totalAreaProvider
//     * @param $category
//     * @param $totalArea
//     * @param $violation
//     */
//    public function testValidateTotalArea($category, $totalArea, $violation)
//    {
//        $ad = new $this->class($category);
//
//        /** @noinspection PhpUndefinedMethodInspection */
//        $this->class::validateTotalArea($totalArea, $this->getContext($ad, $violation),null);
//    }

    protected function setUp(): void
    {
        $this->class = new class($category = null) extends AbstractObject {
            use TotalArea;

            private $category;

            public function __construct(?string $category)
            {
                $this->category = $category;
            }

            public function getCategory(): string
            {
                return $this->category;
            }
        };
    }

    /**
     * @return array
     */
    public function totalAreaProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4.2, false],
        ];
    }

}