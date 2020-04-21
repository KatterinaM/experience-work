<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\CplModeration;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CplModerationTest
 * @package App\Tests\Unit\Entity\Cian
 */
class CplModerationTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var CplModeration */
    private $cplModeration;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->cplModeration = new CplModeration;
    }

    public function testPersonType()
    {
        $this->assertEquals([
            CplModeration::PERSON_TYPE_LEGAL,
            CplModeration::PERSON_TYPE_NATURAL,
        ], CplModeration::PERSON_TYPE);
    }

//    public function testUnknownPersonType()
//    {
//        $this->cplModeration->setType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->cplModeration);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('type', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }

}