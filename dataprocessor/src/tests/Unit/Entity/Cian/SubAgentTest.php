<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\SubAgent;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SubAgentTest
 * @package App\Tests\Unit\Entity\Cian
 */
class SubAgentTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var SubAgent */
    private $subAgent;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->subAgent = new SubAgent;
    }

//    public function testEmptyEmail()
//    {
//        $this->subAgent->setEmail('test@cntp.net');
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->subAgent);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('email', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
//    }
}