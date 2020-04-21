<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Electricity;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ElectricityTests
 * @package App\Tests\Unit\Entity\Cian
 */
class ElectricityTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Electricity */
    private $electricity;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->electricity = new Electricity;
    }

    public function testLocationType()
    {
        $this->assertEquals([
            Electricity::ELECTRICITY_LOCATION_TYPE_BORDER,
            Electricity::ELECTRICITY_LOCATION_TYPE_LOCATION,
            Electricity::ELECTRICITY_LOCATION_TYPE_TYPE_NO
        ], Electricity::ELECTRICITY_LOCATION_TYPE);
    }

    //    public function testUnknownElectricityLocationType()
//    {
//        $this->electricity->setElectricityLocationType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->electricity);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('electricityLocationType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}