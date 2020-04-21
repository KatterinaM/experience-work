<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\CranageTypeSchema;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CranageTypeSchemaTest
 * @package App\Tests\Unit\Entity\Cian
 */
class CranageTypeSchemaTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var CranageTypeSchema */
    private $cranageTypeSchema;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->cranageTypeSchema = new CranageTypeSchema;
    }

    public function testCranageType()
    {
        $this->assertEquals([
            CranageTypeSchema::CRANAGE_TYPE_BEAM,
            CranageTypeSchema::CRANAGE_TYPE_GANTRY,
            CranageTypeSchema::CRANAGE_TYPE_OVERHEAD,
            CranageTypeSchema::CRANAGE_TYPE_RAILWAY,
        ], CranageTypeSchema::CRANAGE_TYPE);
    }

//    public function testUnknownCranageType()
//    {
//        $this->cranageTypeSchema->setCranageType(uniqid());
//
//        /** @var ConstraintViolationList $violations */
//        $violations = $this->validator->validate($this->cranageTypeSchema);
//        $this->assertCount(1, $violations);
//
//        /** @var ConstraintViolation $violation */
//        $violation = $violations->get(0);
//        $this->assertEquals('cranageTypeSchema', $violation->getPropertyPath());
//        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
//    }
}