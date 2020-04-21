<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\LiftTypeSchema;
use App\Tests\Unit\Entity\ValidationTestCase;

class LiftTypeSchemaTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    public function testLiftType()
    {
        $this->assertEquals([
            LiftTypeSchema::LIFT_TYPE_ESCALATOR,
            LiftTypeSchema::LIFT_TYPE_LIFT,
            LiftTypeSchema::LIFT_TYPE_TRAVELATOR
        ], LiftTypeSchema::LIFT_TYPE);
    }

    /**
     * @dataProvider liftTypeProvider
     * @param $category
     * @param $liftType
     * @param $violation
     */
    public function testValidateLiftType($category, $liftType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLiftType($liftType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider additionalTypeProvider
     * @param $category
     * @param $violation
     */
    public function testValidateAdditionalType($category, $additionalType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateAdditionalType($additionalType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider liftCountProvider
     * @param $category
     * @param $liftCount
     * @param $violation
     */
    public function testValidateLiftCount($category, $liftCount, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLiftCount($liftCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider liftLoadCapacityProvider
     * @param $category
     * @param $liftLoadCapacity
     * @param $violation
     */
    public function testValidateLiftLoadCapacity($category, $liftLoadCapacity, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLiftLoadCapacity($liftLoadCapacity, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new LiftTypeSchema;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function liftTypeProvider(): array
    {
        $lift = LiftTypeSchema::LIFT_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $lift, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $lift, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $lift, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $lift, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $lift, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $lift, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $lift, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $lift, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $lift, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $lift, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $lift, true],
        ];
    }

    /**
     * @return array
     */
    public function additionalTypeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, "Какой-то тип", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, "Какой-то тип", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, "Какой-то тип", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, "Какой-то тип", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, "Какой-то тип", false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, "Какой-то тип", false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, "Какой-то тип", true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, "Какой-то тип", true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, "Какой-то тип", true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, "Какой-то тип", true],
        ];
    }

    /**
     * @return array
     */
    public function liftCountProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function liftLoadCapacityProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, true],
        ];
    }
}