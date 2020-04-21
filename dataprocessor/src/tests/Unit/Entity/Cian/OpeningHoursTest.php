<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\OpeningHours;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class OpeningHoursTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var OpeningHours */
    private $openingHours;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->openingHours = new OpeningHours;
    }

    public function testOpeningHoursType()
    {
        $this->assertEquals([
            OpeningHours::OPENING_HOURS_TYPE_ROUND_THE_CLOCK,
            OpeningHours::OPENING_HOURS_TYPE_SPECIFIC,
        ], OpeningHours::OPENING_HOURS_TYPE);
    }

//    public function testUnknownOpeningHoursType()
//    {
//        $this->openingHours->setOpeningHoursType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->openingHours);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('openingHoursType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}