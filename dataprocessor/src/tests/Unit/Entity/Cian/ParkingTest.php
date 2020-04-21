<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\Parking;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class ParkingTest
 * @package App\Tests\Unit\Entity\Cian
 */
class ParkingTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    public function testParkingType()
    {
        $this->assertEquals([
            Parking::PARKING_TYPE_GROUND,
            Parking::PARKING_TYPE_MULTILEVEL,
            Parking::PARKING_TYPE_OPEN,
            Parking::PARKING_TYPE_ROOF,
            Parking::PARKING_TYPE_UNDERGROUND,
        ], Parking::PARKING_TYPE);
    }

    public function testLocationType()
    {
        $this->assertEquals([
            Parking::PARKING_LOCATION_TYPE_EXTERNAL,
            Parking::PARKING_LOCATION_TYPE_INTERNAL
        ], Parking::PARKING_LOCATION_TYPE);
    }

    public function testPurposeType()
    {
        $this->assertEquals([
            Parking::PURPOSE_TYPE_CARGO,
            Parking::PURPOSE_TYPE_PASSENGER
        ], Parking::PURPOSE_TYPE);
    }

    public function testCurrency()
    {
        $this->assertEquals([
            Parking::CURRENCY_EUR,
            Parking::CURRENCY_RUR,
            Parking::CURRENCY_USD
        ], Parking::CURRENCY);
    }

    /**
     * @dataProvider parkingTypeProvider
     * @param $category
     * @param $parkingType
     * @param $violation
     */
    public function testValidateParkingType($category, $parkingType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateParkingType($parkingType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider placesCountProvider
     * @param $category
     * @param $placesCount
     * @param $violation
     */
    public function testValidatePlacesCount($category, $placesCount, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePlacesCount($placesCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider priceMonthlyProvider
     * @param $category
     * @param $priceMonthly
     * @param $violation
     */
    public function testValidatePriceMonthly($category, $priceMonthly, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePriceMonthly($priceMonthly, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider parkingLocationTypeProvider
     * @param $category
     * @param $parkingLocationType
     * @param $violation
     */
    public function testValidateParkingLocationType($category, $parkingLocationType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateParkingLocationType($parkingLocationType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider purposeTypeProvider
     * @param $category
     * @param $purposeType
     * @param $violation
     */
    public function testValidatePurposeType($category, $purposeType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePurposeType($purposeType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider priceEntryProvider
     * @param $category
     * @param $priceEntry
     * @param $violation
     */
    public function testValidatePriceEntry($category, $priceEntry, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePriceEntry($priceEntry, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider parkingCurrencyProvider
     * @param $category
     * @param $parkingCurrency
     * @param $violation
     */
    public function testValidateParkingCurrency($category, $parkingCurrency, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateParkingCurrency($parkingCurrency, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider isFreeProvider
     * @param $category
     * @param $isFree
     * @param $violation
     */
    public function testValidateIsFree($category, $isFree, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateIsFree($isFree, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider deadlineProvider
     * @param $category
     * @param $deadline
     * @param $violation
     */
    public function testValidateDeadline($category, $deadline, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDeadline($deadline, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new Parking;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function parkingTypeProvider(): array
    {
        $parking = Parking::PARKING_TYPE;
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $parking, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $parking, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $parking, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $parking, true],
        ];
    }

    /**
     * @return array
     */
    public function placesCountProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 42, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 42, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 42, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 42, true],
        ];
    }

    /**
     * @return array
     */
    public function priceMonthlyProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4.2, true],
        ];
    }

    /**
     * @return array
     */
    public function parkingLocationTypeProvider(): array
    {
        $parking = Parking::PARKING_LOCATION_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $parking, true],
        ];
    }

    /**
     * @return array
     */
    public function purposeTypeProvider(): array
    {
        $parking = Parking::PURPOSE_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $parking, true],
        ];
    }

    /**
     * @return array
     */
    public function priceEntryProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4.2, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4.2, true],
        ];
    }

    /**
     * @return array
     */
    public function parkingCurrencyProvider(): array
    {
        $parking = Parking::CURRENCY;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $parking, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $parking, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $parking, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $parking, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $parking, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $parking, true],
        ];
    }

    /**
     * @return array
     */
    public function isFreeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
        ];
    }

    /**
     * @return array
     */
    public function deadlineProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, array(1=>2), false],


            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, array(1=>2), true],
        ];
    }
}