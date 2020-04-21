<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\AgentBonus;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AgentBonusTest
 * @package App\Tests\Unit\Entity\Cian
 */
class AgentBonusTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var AgentBonus */
    private $agentBonus;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->agentBonus = new AgentBonus;
    }

    public function testCurrency()
    {
        $this->assertEquals([
            AgentBonus::CURRENCY_EUR,
            AgentBonus::CURRENCY_RUR,
            AgentBonus::CURRENCY_USD
        ], AgentBonus::CURRENCY);
    }

    public function testPaymentType()
    {
        $this->assertEquals([
            AgentBonus::PAYMENT_TYPE_FIXED,
            AgentBonus::PAYMENT_TYPE_PERCENT
        ], AgentBonus::PAYMENT_TYPE);
    }

//    public function testUnknownPaymentType()
//    {
//        $this->agentBonus->setPaymentType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->agentBonus);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('paymentType', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
//
//    public function testUnknownCurrency()
//    {
//        $this->agentBonus->setCurrency(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->agentBonus);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('currency', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}