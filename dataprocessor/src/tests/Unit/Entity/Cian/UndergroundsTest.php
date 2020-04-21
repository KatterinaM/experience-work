<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Undergrounds;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UndergroundsTest
 * @package App\Tests\Unit\Entity\Cian
 */
class UndergroundsTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Undergrounds */
    private $undergrounds;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->undergrounds = new Undergrounds;
    }

    public function testTransportType()
    {
        $this->assertEquals([
            Undergrounds::TRANSPORT_TYPE_TRANSPORT,
            Undergrounds::TRANSPORT_TYPE_WALK,
        ], Undergrounds::TRANSPORT_TYPE);
    }

//    public function testUnknownTransportType()
//    {
//        $this->undergrounds->setTransportType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->undergrounds);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('electricityLocationType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}