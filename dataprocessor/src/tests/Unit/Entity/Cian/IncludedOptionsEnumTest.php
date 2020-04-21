<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\IncludedOptionsEnum;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class IncludedOptionsEnumTest
 * @package App\Tests\Unit\Entity\Cian
 */
class IncludedOptionsEnumTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var IncludedOptionsEnum */
    private $includedOptionsEnum;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->includedOptionsEnum = new IncludedOptionsEnum;
    }

    public function testIncludedOptionsEnum()
    {
        $this->assertEquals([
            IncludedOptionsEnum::INCLUDED_OPTIONS_ENUM_OPERATIONAL_COSTS,
            IncludedOptionsEnum::INCLUDED_OPTIONS_ENUM_UTILITY_CHARGES
        ], IncludedOptionsEnum::INCLUDED_OPTIONS_ENUM);
    }

//    public function testUnknownIncludedOptionsEnum()
//    {
//        $this->includedOptionsEnum->setIncludedOptionsEnum(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->includedOptionsEnum);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('includedOptionsEnum', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}