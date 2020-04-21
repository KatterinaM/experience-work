<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\JCSchemaInfo;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class JCSchemaInfoTest
 * @package App\Tests\Unit\Entity\Cian
 */
class JCSchemaInfoTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    /**
     * @dataProvider jCSchemaIdProvider
     * @param $category
     * @param $jCSchemaId
     * @param $violation
     */
    public function testValidateJCSchemaId($category, $jCSchemaId, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateJCSchemaId($jCSchemaId, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider jCSchemaNameProvider
     * @param $category
     * @param $jCSchemaName
     * @param $violation
     */
    public function testValidateJCSchemaName($category, $jCSchemaName, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateJCSchemaName($jCSchemaName, $this->getContext($ad, $violation),null);
    }


    protected function setUp(): void
    {
        $this->class = new JCSchemaInfo;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function jCSchemaIdProvider(): array
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
    public function jCSchemaNameProvider(): array
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
}