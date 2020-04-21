<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\House;
use App\Tests\Unit\Entity\ValidationTestCase;

class HouseTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    /**
     * @dataProvider houseIdProvider
     * @param $category
     * @param $houseId
     * @param $violation
     */
    public function testValidateHouseId($category, $houseId, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHouseId($houseId, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider houseNameProvider
     * @param $category
     * @param $houseName
     * @param $violation
     */
    public function testValidateHouseName($category, $houseName, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHouseName($houseName, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider flatProvider
     * @param $category
     * @param $flat
     * @param $violation
     */
    public function testValidateFlat($category, $flat, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateFlat($flat, $this->getContext($ad, $violation),null);
    }


    protected function setUp(): void
    {
        $this->class = new House;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function houseIdProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 12, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 12, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 12, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 12, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 12, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 12, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 12, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 12, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 12, true],
        ];
    }

    /**
     * @return array
     */
    public function houseNameProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, "Какой-то ЖК", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, "Какой-то ЖК", false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, "Какой-то ЖК", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, "Какой-то ЖК", true],
        ];
    }

    /**
     * @return array
     */
    public function flatProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, array(1=>2), true],
        ];
    }
}