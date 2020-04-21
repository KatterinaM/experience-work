<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\SalesAgent;
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
class SalesAgentTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var SalesAgent */
    private $salesAgent;

    public function testCategories()
    {
        $this->assertEquals([
            SalesAgent::CATEGORY_AGENCY,
            SalesAgent::CATEGORY_OWNER,
            SalesAgent::CATEGORY_DEVELOPER,
        ], SalesAgent::CATEGORIES);
    }

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->salesAgent = new SalesAgent;
    }

    public function testEmptyPhone()
    {
        $this->salesAgent->setCategory(SalesAgent::CATEGORY_OWNER);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->salesAgent);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('phone', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testEmptyCategory()
    {
        $this->salesAgent->setPhone('6550101');

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->salesAgent);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('category', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testIncorrectCategory()
    {
        $this->salesAgent->setPhone('6550101');
        $this->salesAgent->setCategory(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->salesAgent);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('category', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }
}
