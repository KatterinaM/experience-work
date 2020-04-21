<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Drainage;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class DrainageTest
 * @package App\Tests\Unit\Entity\Cian
 */
class DrainageTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Drainage */
    private $drainage;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->drainage = new Drainage;
    }

    public function testLocationType()
    {
        $this->assertEquals([
            Drainage::DRAINAGE_LOCATION_TYPE_BORDER,
            Drainage::DRAINAGE_LOCATION_TYPE_LOCATION,
            Drainage::DRAINAGE_LOCATION_TYPE_NO,
        ], Drainage::DRAINAGE_LOCATION_TYPE);
    }

    public function testType()
    {
        $this->assertEquals([
            Drainage::DRAINAGE_TYPE_AUTONOMOUS,
            Drainage::DRAINAGE_TYPE_CENTRAL,
        ], Drainage::DRAINAGE_TYPE);
    }

//    public function testUnknownDrainageLocationType()
//    {
//        $this->drainage->setDrainageLocationType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->drainage);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('drainageLocationType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
//    public function testUnknownDrainageType()
//    {
//        $this->drainage->setDrainageType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->drainage);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('drainageType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}