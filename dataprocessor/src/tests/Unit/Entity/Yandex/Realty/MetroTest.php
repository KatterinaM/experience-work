<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Metro;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class MetroTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class MetroTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Metro */
    private $metro;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->metro = new Metro;
    }

    public function testEmptyName()
    {
        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->metro);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('name', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testNegativeTimeOnTransport()
    {
        $this->metro->setName(uniqid());
        $this->metro->setTimeOnTransport(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->metro);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('timeOnTransport', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testNegativeTimeOnFoot()
    {
        $this->metro->setName(uniqid());
        $this->metro->setTimeOnFoot(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->metro);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('timeOnFoot', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }
}
