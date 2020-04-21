<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\PlacementTypeInterface;
use App\Entity\Cian\Traits\PlacementType;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class PlacementTypeTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class PlacementTypeTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider placementTypeProvider
     * @param $category
     * @param $placementType
     * @param $violation
     */
    public function testValidatePlacementType($category, $placementType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePlacementType($placementType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider propertyTypeProvider
     * @param $category
     * @param $propertyType
     * @param $violation
     */
    public function testValidatePropertyType($category, $propertyType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePropertyType($propertyType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider specialtyProvider
     * @param $category
     * @param $specialty
     * @param $violation
     */
    public function testValidateSpecialty($category, $specialty, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateSpecialty($specialty, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider permittedUseTypeProvider
     * @param $category
     * @param $permittedUseType
     * @param $violation
     */
    public function testValidatePermittedUseType($category, $permittedUseType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePermittedUseType($permittedUseType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider possibleToChangePermitedUseTypeProvider
     * @param $category
     * @param $possibleToChangePermitedUseType
     * @param $violation
     */
    public function testValidatePossibleToChangePermitedUseType($category, $possibleToChangePermitedUseType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePossibleToChangePermitedUseType($possibleToChangePermitedUseType, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new class($category = null) extends AbstractObject {
            use PlacementType;

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
    public function placementTypeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, PlacementTypeInterface::PLACEMENT_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, PlacementTypeInterface::PLACEMENT_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, PlacementTypeInterface::PLACEMENT_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function propertyTypeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, PlacementTypeInterface::PROPERTY_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, PlacementTypeInterface::PROPERTY_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, PlacementTypeInterface::PROPERTY_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function specialtyProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, array(1=>2), true],
        ];
    }

    /**
     * @return array
     */
    public function permittedUseTypeProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, PlacementTypeInterface::PERMITTED_USE_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function possibleToChangePermitedUseTypeProvider(): array
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

}