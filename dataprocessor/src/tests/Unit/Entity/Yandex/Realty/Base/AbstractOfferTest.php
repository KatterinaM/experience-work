<?php

namespace App\Tests\Unit\Entity\Yandex\Realty\Base;

use App\Entity\Yandex\Realty\Base\AbstractOffer;
use App\Entity\Yandex\Realty\Location;
use App\Tests\Unit\Entity\ValidationTestCase;
use DateTime;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class AbstractOfferTest
 * @package App\Tests\Unit\Entity\Yandex\Realty\Base
 */
class AbstractOfferTest extends ValidationTestCase
{
    /** @var ValidatorInterface  */
    private $validator;

    /** @var AbstractOffer */
    private $offer;

    private $class;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();

        $this->class = new class extends AbstractOffer
        {
            public function getCategory(): string
            {
                return null;
            }
        };
    }

    protected function setUp(): void
    {
        $this->offer = new $this->class;
    }

    public function testOfferTypes(): void
    {
        $this->assertEquals([
            AbstractOffer::OFFER_TYPE_SELL,
            AbstractOffer::OFFER_TYPE_LEASE,
        ], AbstractOffer::OFFER_TYPES);
    }

    public function testEmptyInternalId()
    {
        $this->offer->setType(AbstractOffer::OFFER_TYPE_SELL);
        $this->offer->setCreationDate(new DateTime());
        $this->offer->setLocation(new Location);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('internalId', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testEmptyType()
    {
        $this->offer->setInternalId('123');
        $this->offer->setCreationDate(new DateTime());
        $this->offer->setLocation(new Location);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('type', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotBlank::class, $violation->getConstraint());
    }

    public function testUnknownType()
    {
        $this->offer->setInternalId(uniqid());
        $this->offer->setType(uniqid());
        $this->offer->setCreationDate(new DateTime());
        $this->offer->setLocation(new Location);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('type', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Choice::class, $violation->getConstraint());
    }

    public function testEmptyCreationDate()
    {
        $this->offer->setInternalId(uniqid());
        $this->offer->setType(AbstractOffer::OFFER_TYPE_SELL);
        $this->offer->setLocation(new Location);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('creationDate', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotNull::class, $violation->getConstraint());
    }

    public function testIncorrectUrl()
    {
        $this->offer->setInternalId(uniqid());
        $this->offer->setCreationDate(new DateTime());
        $this->offer->setType(AbstractOffer::OFFER_TYPE_SELL);
        $this->offer->setLocation(new Location);
        $this->offer->setUrl(uniqid());

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('url', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\Url::class, $violation->getConstraint());
    }

    public function testEmptyLocation()
    {
        $this->offer->setInternalId(uniqid());
        $this->offer->setCreationDate(new DateTime);
        $this->offer->setType(AbstractOffer::OFFER_TYPE_SELL);

        /** @var ConstraintViolationList $violations */
        $violations = $this->validator->validate($this->offer);
        $this->assertCount(1, $violations);

        /** @var ConstraintViolation $violation */
        $violation = $violations->get(0);
        $this->assertEquals('location', $violation->getPropertyPath());
        $this->assertInstanceOf(Constraints\NotNull::class, $violation->getConstraint());
    }

    /**
     * @dataProvider cadastralNumberProvider
     * @param $cadastralNumber
     * @param $violation
     */
    public function testValidateCadastralNumber($cadastralNumber, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCadastralNumber(
            $cadastralNumber,
            $this->getContext($ad, $violation, false),
            null
        );
    }

    /**
     * @return array
     */
    public function cadastralNumberProvider(): array
    {
        return [
            ['47:14:1203001:814', false],
            ['47:14:120300:814', false],
            ['7:14:1203001:814', true],
            ['47:4:1203001:814', true],
            ['47:14:12030010:814', true],
            ['47:14:12030:814', true],
            ['47:14:12030:', true],
            ['471412030814', true],
            ['', true],
            [null, false],
        ];
    }
}
