<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\ServicesEnum;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ServicesEnumTest
 * @package App\Tests\Unit\Entity\Cian
 */
class ServicesEnumTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var ServicesEnum */
    private $servicesEnum;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->servicesEnum = new ServicesEnum;
    }

    public function testServicesEnum()
    {
        $this->assertEquals([
            ServicesEnum::SERVICES_ENUM_FREE,
            ServicesEnum::SERVICES_ENUM_HIGHLIGHT,
            ServicesEnum::SERVICES_ENUM_PAID,
            ServicesEnum::SERVICES_ENUM_PREMIUM,
            ServicesEnum::SERVICES_ENUM_TOP3,
        ], ServicesEnum::SERVICES_ENUM);
    }

//    public function testUnknownServicesEnum()
//    {
//        $this->servicesEnum->setServicesEnum(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->servicesEnum);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('servicesEnum', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}