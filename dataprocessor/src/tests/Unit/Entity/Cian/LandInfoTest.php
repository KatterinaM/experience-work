<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\LandInfo;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class LandInfoTest
 * @package App\Tests\Unit\Entity\Cian
 */
class LandInfoTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    public function testAreaUnitType()
    {
        $this->assertEquals([
            LandInfo::AREA_UNIT_TYPE_HECTARE,
            LandInfo::AREA_UNIT_TYPE_SOTKA
        ], LandInfo::AREA_UNIT_TYPE);
    }

    public function testType()
    {
        $this->assertEquals([
            LandInfo::LAND_TYPE_OWNED,
            LandInfo::LAND_TYPE_RENT
        ], LandInfo::LAND_TYPE);
    }

    public function testStatus()
    {
        $this->assertEquals([
            LandInfo::LAND_STATUS_FOR_AGRICULTURAL_PURPOSES,
            LandInfo::LAND_STATUS_INDUSTRY_TRANSPORT_COMMUNICATION,
            LandInfo::LAND_STATUS_SETTLEMENTS,
        ], LandInfo::LAND_STATUS);
    }

    /**
     * @dataProvider landAreaProvider
     * @param $category
     * @param $landArea
     * @param $violation
     */
    public function testValidateLandArea($category, $landArea, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLandArea($landArea, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider landAreaUnitTypeProvider
     * @param $category
     * @param $landAreaUnitType
     * @param $violation
     */
    public function testValidateLandAreaUnitType($category, $landAreaUnitType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLandAreaUnitType($landAreaUnitType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider landTypeProvider
     * @param $category
     * @param $landType
     * @param $violation
     */
    public function testValidateLandType($category, $landType, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLandType($landType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider landStatusProvider
     * @param $category
     * @param $landStatus
     * @param $violation
     */
    public function testValidateLandStatus($category, $landStatus, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLandStatus($landStatus, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider possibleToChangeStatusProvider
     * @param $category
     * @param $possibleToChangeStatus
     * @param $violation
     */
    public function testValidatePossibleToChangeStatus($category, $possibleToChangeStatus, $violation)
    {
        $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePossibleToChangeStatus($possibleToChangeStatus, $this->getContext($ad, $violation),null);
    }
    

    protected function setUp(): void
    {
        $this->class = new LandInfo;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function landAreaProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4.2, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4.2, true],
        ];
    }

    /**
     * @return array
     */
    public function landAreaUnitTypeProvider(): array
    {
        $land = LandInfo::AREA_UNIT_TYPE;
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $land, true],


        ];
    }

    /**
     * @return array
     */
    public function landTypeProvider(): array
    {
        $land = LandInfo::LAND_TYPE;
        
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $land, true],
        ];
    }

    /**
     * @return array
     */
    public function landStatusProvider(): array
    {
        $land = LandInfo::LAND_STATUS;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $land, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $land, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $land, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $land, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $land, true],
        ];
    }

    /**
     * @return array
     */
    public function possibleToChangeStatusProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],
        ];
    }

}