<?php

namespace App\Tests\Unit\Entity\Cian\Base;

use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\CommercialCategoryType;
use App\Entity\Cian\Traits\ConditionsCommercialRealty;
use App\Entity\Cian\Traits\JCSchema;
use App\Entity\Cian\Traits\Land;
use App\Entity\Cian\Traits\Ownership;
use App\Entity\Cian\Traits\PlacementType;
use App\Entity\Cian\Traits\TotalArea;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class CommercialObjectTest
 * @package App\Tests\Unit\Entity\Cian\Base
 */
class CommercialObjectTest extends ValidationTestCase
{
    private $class;

    public function testTraits()
    {
        $this->assertEquals([
            CommercialCategoryType::class,
            JCSchema::class,
            AllInfrastructure::class,
            PlacementType::class,
            ConditionsCommercialRealty::class,
            Ownership::class,
            Land::class,
            TotalArea::class,
            BargainTerms::class,
            Building::class,
        ], array_values(class_uses(CommercialObject::class)));
    }


    public function testConditionType(): void
    {
        $this->assertEquals([
            CommercialObject::CONDITION_TYPE_COSMETIC_REPAIRS_REQUIRED,
            CommercialObject::CONDITION_TYPE_DESIGN,
            CommercialObject::CONDITION_TYPE_FINISHING,
            CommercialObject::CONDITION_TYPE_MAJOR_REPAIRS_REQUIRED,
            CommercialObject::CONDITION_TYPE_TYPICAL,
            CommercialObject::CONDITION_TYPE_OFFICE,
        ], CommercialObject::CONDITION_TYPE);
    }

    /**
     *
     * @dataProvider minAreaProvider
     * @param $category
     * @param $minArea
     * @param $violation
     */
    public function testValidateMinArea($category, $minArea, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateMinArea($minArea, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider conditionTypeProvider
     * @param $category
     * @param $conditionType
     * @param $violation
     */
    public function testValidateConditionType($category, $conditionType, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateConditionType($conditionType, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider hasInvestmentProjectProvider
     * @param $category
     * @param $hasInvestmentProject
     * @param $violation
     */
    public function testValidateHasInvestmentProject($category, $hasInvestmentProject, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasInvestmentProject($hasInvestmentProject, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider hasEncumbrancesProvider
     * @param $category
     * @param $hasEncumbrances
     * @param $violation
     */
    public function testValidateHasEncumbrances($category, $hasEncumbrances, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasEncumbrances($hasEncumbrances, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider isOccupiedProvider
     * @param $category
     * @param $isOccupied
     * @param $violation
     */
    public function testValidateIsOccupied($category, $isOccupied, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateIsOccupied($isOccupied, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider businessShoppingCenterIdProvider
     * @param $category
     * @param $businessShoppingCenterId
     * @param $violation
     */
    public function testValidateBusinessShoppingCenterId($category, $businessShoppingCenterId, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBusinessShoppingCenterId($businessShoppingCenterId, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function minAreaProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 42.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 42.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 42.2, true],
        ];
    }

    /**
     * @return array
     */
    public function conditionTypeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, CommercialObject::CONDITION_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, CommercialObject::CONDITION_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, CommercialObject::CONDITION_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, CommercialObject::CONDITION_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, CommercialObject::CONDITION_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function hasInvestmentProjectProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, false],


            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

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

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

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
        ];
    }

    /**
     * @return array
     */
    public function hasEncumbrancesProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, false],


            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

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

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

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
        ];
    }

    /**
     * @return array
     */
    public function isOccupiedProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function businessShoppingCenterIdProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 42, true],
        ];
    }
}