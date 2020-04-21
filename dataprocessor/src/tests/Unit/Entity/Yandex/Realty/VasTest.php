<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Vas;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SalesAgentTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class VasTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Vas */
    private $vas;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->vas = new Vas;
    }

    public function testVasTypes()
    {
        $this->assertEquals([
            Vas::VAS_TYPE_PREMIUM,
            Vas::VAS_TYPE_RAISE,
            Vas::VAS_TYPE_PROMOTION,
        ], Vas::VAS_TYPES);
    }

    public function testEmptyValue()
    {
        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->vas);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('value', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testIncorrectValue()
    {
        $this->vas->setValue(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->vas);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('value', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }
}
