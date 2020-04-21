<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\ExcludedServicesEnum;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ExcludedServicesEnumTest
 * @package App\Tests\Unit\Entity\Cian
 */
class ExcludedServicesEnumTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var ExcludedServicesEnum */
    private $excludedServicesEnum;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->excludedServicesEnum = new ExcludedServicesEnum;
    }

    public function testExcludedServicesEnum()
    {
        $this->assertEquals([
            ExcludedServicesEnum::EXCLUDED_SERVICES_ENUM_HIGHLIGHT,
            ExcludedServicesEnum::EXCLUDED_SERVICES_ENUM_PREMIUM,
            ExcludedServicesEnum::EXCLUDED_SERVICES_ENUM_TOP3,
        ], ExcludedServicesEnum::EXCLUDED_SERVICES_ENUM);
    }

    //    public function testUnknownExcludedServicesEnum()
//    {
//        $this->excludedServicesEnum->setExcludedServicesEnum(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->excludedServicesEnum);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('excludedServicesEnum', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }

}