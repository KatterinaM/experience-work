<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\Phones;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class PhonesTest
 * @package App\Tests\Unit\Entity\Cian
 */
class PhonesTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Phones */
    private $phones;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->phones = new Phones;
    }

    public function testEmptyCountryCode()
    {
        $this->phones->setCountryCode('+7');

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->phones);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('countryCode', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testEmptyNumber()
    {
        $this->phones->setNumber('8126550101');

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->phones);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('number', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

}