<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Area;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AreaTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class AreaTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Area */
    private $area;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->area = new Area;
    }

    public function testUnits()
    {
        $this->assertEquals([
            Area::UNIT_SQM,
            Area::UNIT_100,
            Area::UNIT_HECTARE,
        ], Area::UNITS);
    }

    public function testNegativeValue()
    {
        $this->area->setValue(-1.23);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->area);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('value', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testUnknownUnit()
    {
        $this->area->setUnit(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->area);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('unit', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }
}
