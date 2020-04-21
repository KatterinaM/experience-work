<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Price;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class PriceTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class PriceTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Price */
    private $price;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->price = new Price;
    }

    public function testCurrencies()
    {
        $this->assertEquals([
            Price::CURRENCY_RUB,
            Price::CURRENCY_RUR,
            Price::CURRENCY_EUR,
            Price::CURRENCY_USD,
        ], Price::CURRENCIES);
    }

    public function testPeriods()
    {
        $this->assertEquals([
            Price::PERIOD_DAY,
            Price::PERIOD_MONTH,
        ], Price::PERIODS);
    }

    public function testTaxationForms()
    {
        $this->assertEquals([
            Price::TAXATION_FORM_NDS,
            Price::TAXATION_FORM_USN,
        ], Price::TAXATION_FORMS);
    }

    public function testEmptyValue()
    {
        $this->price->setCurrency(Price::CURRENCY_RUB);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('value', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testNegativeValue()
    {
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setValue(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('value', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testEmptyCurrency()
    {
        $this->price->setValue(123);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('currency', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testIncorrectCurrency()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('currency', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testIncorrectPeriod()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setPeriod(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('period', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testIncorrectUnit()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setUnit(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('unit', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testNegativeCommission()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setCommission(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('commission', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testNegativePrepayment()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setPrepayment(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('prepayment', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());
    }

    public function testIncorrectSecurityPayment()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setSecurityPayment(-1);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('securityPayment', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\GreaterThan::class, $violation->getConstraint());

        $this->price->setSecurityPayment(601);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('securityPayment', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\LessThanOrEqual::class, $violation->getConstraint());
    }

    public function testIncorrectTaxationForm()
    {
        $this->price->setValue(123);
        $this->price->setCurrency(Price::CURRENCY_RUB);
        $this->price->setTaxationForm(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->price);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('taxationForm', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }
}
