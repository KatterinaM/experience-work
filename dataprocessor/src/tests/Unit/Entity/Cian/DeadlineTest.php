<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Deadline;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class DeadlineTest
 * @package App\Tests\Unit\Entity\Cian
 */
class DeadlineTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Deadline */
    private $deadline;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->deadline = new Deadline;
    }

    public function testQuarter()
    {
        $this->assertEquals([
            Deadline::QUARTER_FIRST,
            Deadline::QUARTER_SECOND,
            Deadline::QUARTER_THIRD,
            Deadline::QUARTER_FOURTH
        ], Deadline::QUARTER);
    }

//    public function testUnknownQuarter()
//    {
//        $this->deadline->setQuarter(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->deadline);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('quarter', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}