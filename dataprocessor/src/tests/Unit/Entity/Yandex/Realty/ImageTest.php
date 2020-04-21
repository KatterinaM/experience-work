<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Image;
use App\Tests\Unit\Entity\ValidationTestCase;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ImageTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class ImageTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var Image */
    private $image;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();
    }

    public function setUp(): void
    {
        $this->image = new Image;
    }

    public function testIncorrectUrl()
    {
        $this->image->setUrl(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->image);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('url', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Url::class, $violation->getConstraint());
    }
}
