<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Gas;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GasTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Gas */
    private $gas;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->gas = new Gas;
    }

    public function testLocationType()
    {
        $this->assertEquals([
            Gas::GAS_LOCATION_TYPE_BORDER,
            Gas::GAS_LOCATION_TYPE_LOCATION,
            Gas::GAS_LOCATION_TYPE_NO
        ], Gas::GAS_LOCATION_TYPE);
    }

//    public function testUnknownGasLocationType()
//    {
//        $this->gas->setGasLocationType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->gas);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('gasLocationType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}