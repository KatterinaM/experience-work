<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Area;
use App\Entity\Yandex\Realty\CommercialOffer;
use App\Entity\Yandex\Realty\Location;
use App\Entity\Yandex\Realty\Price;
use App\Entity\Yandex\Realty\SalesAgent;
use App\Tests\Unit\Entity\ValidationTestCase;
use DateTime;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CommercialOfferTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class CommercialOfferTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var CommercialOffer */
    private $offer;

    /** @var SalesAgent */
    private $salesAgent;

    /** @var Price */
    private $price;

    /** @var Area */
    private $area;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();

        $this->salesAgent = new SalesAgent;
        $this->salesAgent->setPhone('6550101');
        $this->salesAgent->setPhone('6550101');
        $this->salesAgent->setCategory(SalesAgent::CATEGORY_OWNER);

        $this->price = new Price;
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);

        $this->area = new Area;
    }

    protected function setUp(): void
    {
        $this->offer = new CommercialOffer;
        $this->offer->setInternalId(uniqid());
        $this->offer->setType(CommercialOffer::OFFER_TYPE_LEASE);
        $this->offer->setCreationDate(new DateTime());
        $this->offer->setLocation(new Location);
    }

    public function testCommercialTypes()
    {
        $this->assertEquals([
            CommercialOffer::COMMERCIAL_TYPE_AUTO_REPAIR,
            CommercialOffer::COMMERCIAL_TYPE_BUSINESS,
            CommercialOffer::COMMERCIAL_TYPE_FREE_PURPOSE,
            CommercialOffer::COMMERCIAL_TYPE_HOTEL,
            CommercialOffer::COMMERCIAL_TYPE_LAND,
            CommercialOffer::COMMERCIAL_TYPE_LEGAL_ADDRESS,
            CommercialOffer::COMMERCIAL_TYPE_MANUFACTURING,
            CommercialOffer::COMMERCIAL_TYPE_OFFICE,
            CommercialOffer::COMMERCIAL_TYPE_PUBLIC_CATERING,
            CommercialOffer::COMMERCIAL_TYPE_RETAIL,
            CommercialOffer::COMMERCIAL_TYPE_WAREHOUSE,
        ], CommercialOffer::COMMERCIAL_TYPES);
    }
    
    public function testBuildingTypes()
    {
        $this->assertEquals([
            CommercialOffer::BUILDING_TYPE_BUSINESS_CENTER,
            CommercialOffer::BUILDING_TYPE_DETACHED_BUILDING,
            CommercialOffer::BUILDING_TYPE_RESIDENTIAL_BUILDING,
            CommercialOffer::BUILDING_TYPE_SHOPPING_CENTER,
            CommercialOffer::BUILDING_TYPE_WAREHOUSE,
        ], CommercialOffer::BUILDING_TYPES);
    }

    public function testPurposes()
    {
        $this->assertEquals([
            CommercialOffer::PURPOSE_BANK,
            CommercialOffer::PURPOSE_BEAUTY_SHOP,
            CommercialOffer::PURPOSE_FOOD_STORE,
            CommercialOffer::PURPOSE_MEDICAL_CENTER,
            CommercialOffer::PURPOSE_SHOW_ROOM,
            CommercialOffer::PURPOSE_TOURAGENCY,
        ], CommercialOffer::PURPOSES);
    }

    public function testPurposesWarehouse()
    {
        $this->assertEquals([
            CommercialOffer::PURPOSES_WAREHOUSE_ALCOHOL,
            CommercialOffer::PURPOSES_WAREHOUSE_PHARMACEUTICAL_STOREHOUSE,
            CommercialOffer::PURPOSES_WAREHOUSE_VEGETABLE_STOREHOUSE,
        ], CommercialOffer::PURPOSES_WAREHOUSE);
    }

    public function testRenovations()
    {
        $this->assertEquals([
            CommercialOffer::RENOVATION_DESIGNER,
            CommercialOffer::RENOVATION_EURO,
            CommercialOffer::RENOVATION_NONE,
            CommercialOffer::RENOVATION_FINE,
            CommercialOffer::RENOVATION_PARTIAL,
            CommercialOffer::RENOVATION_HAS_FACING,
            CommercialOffer::RENOVATION_ROUGH_FACING,
        ], CommercialOffer::RENOVATIONS);
    }

    public function testQualities()
    {
        $this->assertEquals([
            CommercialOffer::QUALITY_FINE,
            CommercialOffer::QUALITY_GOOD,
            CommercialOffer::QUALITY_NORMAL,
            CommercialOffer::QUALITY_BAD,
        ], CommercialOffer::QUALITIES);
    }

    public function testEmptyCommercialType()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('commercialType', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testUnknownCommercialType()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('commercialType', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testEmptySalesAgent()
    {
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('salesAgent', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotNull::class, $violation->getConstraint());
    }

    public function testUnknownCommercialBuildingType()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setCommercialBuildingType(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('commercialBuildingType', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownPurpose()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setPurpose(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('purpose', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownPurposeWarehouse()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setPurposeWarehouse(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('purposeWarehouse', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownRenovation()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setRenovation(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('renovation', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownQuality()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setQuality(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('quality', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownOfficeClass()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setOfficeClass(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('officeClass', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testNegativeCeilingHeight()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setCeilingHeight(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('ceilingHeight', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testNegativePparkingPlaces()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setParkingPlaces(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('parkingPlaces', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThanOrEqual::class, $violation->getConstraint());
    }

    public function testNegativePparkingPlacePrice()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setParkingPlacePrice(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('parkingPlacePrice', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThanOrEqual::class, $violation->getConstraint());
    }

    public function testNegativePparkingGuest()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setParkingGuest(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('parkingGuest', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThanOrEqual::class, $violation->getConstraint());
    }

    public function testNegativeRooms()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setRooms(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('rooms', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testNegativePhoneLines()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setPhoneLines(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('phoneLines', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThanOrEqual::class, $violation->getConstraint());
    }

    public function testNegativeElectricCapacity()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setElectricCapacity(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('electricCapacity', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testNegativePalletPrice()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setPalletPrice(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('palletPrice', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThanOrEqual::class, $violation->getConstraint());
    }

    public function testUnknownEntranceType()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setEntranceType(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('entranceType', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownFloorCovering()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setFloorCovering(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('floorCovering', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownWindowType()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setWindowType(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('windowType', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testUnknownWindowView()
    {
        $this->offer->setSalesAgent($this->salesAgent);
        $this->offer->setPrice($this->price);
        $this->offer->setArea($this->area);
        $this->offer->setFloor(12);
        $this->offer->setCommercialType(CommercialOffer::COMMERCIAL_TYPE_OFFICE);
        $this->offer->setWindowView(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('windowView', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }
}
