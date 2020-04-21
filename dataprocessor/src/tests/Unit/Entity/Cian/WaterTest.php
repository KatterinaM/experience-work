<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Water;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class WaterTest
 * @package App\Tests\Unit\Entity\Cian
 */
class WaterTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Water */
    private $water;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->water = new Water;
    }

    public function testLocationType()
    {
        $this->assertEquals([
            Water::WATER_LOCATION_TYPE_BORDER,
            Water::WATER_LOCATION_TYPE_LOCATION,
            Water::WATER_LOCATION_TYPE_NO,
        ], Water::WATER_LOCATION_TYPE);
    }

    public function testType()
    {
        $this->assertEquals([
            Water::WATER_TYPE_AUTONOMOUS,
            Water::WATER_TYPE_CENTRAL,
            Water::WATER_TYPE_PUMPING_STATION,
            Water::WATER_TYPE_WATER_INTAKE_FACILITY,
            Water::WATER_TYPE_WATER_TOWER,
        ], Water::WATER_TYPE);
    }

//    public function testUnknownWaterLocationType()
//    {
//        $this->water->setWaterLocationType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->water);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('waterLocationType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
//
//    public function testUnknownWaterType()
//    {
//        $this->water->setWaterType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->water);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('waterType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}