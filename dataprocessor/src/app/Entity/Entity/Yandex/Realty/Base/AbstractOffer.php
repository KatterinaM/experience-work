<?php

namespace App\Entity\Yandex\Realty\Base;

use App\Entity\Yandex\Realty\Location;
use App\Entity\Yandex\Realty\Vas;
use DateTime;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AbstractOffer
 * @package App\Entity\Yandex\Realty\Base
 */
abstract class AbstractOffer
{
    const CATEGORY_COMMERCIAL = 'commercial';

    const OFFER_TYPE_SELL = 'продажа';
    const OFFER_TYPE_LEASE = 'аренда';

    const OFFER_TYPES = [
        self::OFFER_TYPE_SELL,
        self::OFFER_TYPE_LEASE,
    ];

    /**
     * @var int|string
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("internal-id")
     * @Constraints\NotBlank()
     */
    private $internalId;

    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\AbstractOffer::OFFER_TYPES)
     */
    private $type;

    /**
     * @var DateTime
     * @Serializer\SerializedName("creation-date")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("DateTime")
     */
    private $creationDate;

    /**
     * @var string
     * @Serializer\SerializedName("lot-number")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $lotNumber;

    /**
     * @var string
     * @Serializer\SerializedName("url")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Url()
     */
    private $url;

    /**
     * @var string
     * @Serializer\SerializedName("cadastral-number")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Callback({ "App\Entity\Yandex\Realty\Base\AbstractOffer", "validateCadastralNumber" })
     */
    private $cadastralNumber;

    /**
     * @var Location
     * @Serializer\SerializedName("location")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Yandex\Realty\Location")
     * @Constraints\Valid()
     */
    private $location;

    /**
     * @var Vas
     * @Serializer\SerializedName("vas")
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("App\Entity\Yandex\Realty\Vas")
     * @Constraints\Valid()
     */
    private $vas;

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("category")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    abstract public function getCategory(): string;

    /**
     * @return int|string
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * @param int|string $internalId
     */
    public function setInternalId($internalId): void
    {
        $this->internalId = $internalId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate(DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getLotNumber(): string
    {
        return $this->lotNumber;
    }

    /**
     * @param string $lotNumber
     */
    public function setLotNumber(string $lotNumber): void
    {
        $this->lotNumber = $lotNumber;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getCadastralNumber(): string
    {
        return $this->cadastralNumber;
    }

    /**
     * @param string $cadastralNumber
     */
    public function setCadastralNumber(string $cadastralNumber): void
    {
        $this->cadastralNumber = $cadastralNumber;
    }

    /**
     * @return Location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return Vas
     */
    public function getVas(): ?Vas
    {
        return $this->vas;
    }

    /**
     * @param Vas $vas
     */
    public function setVas(Vas $vas): void
    {
        $this->vas = $vas;
    }

    /**
     * @param mixed $cadastralNumber
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateCadastralNumber(
        $cadastralNumber,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        if (!is_null($cadastralNumber) && !preg_match('/^\d{2}:\d{2}:\d{6,7}:\d{1,35}$/', $cadastralNumber)) {
            $context->buildViolation('Неверный формат кадастрового номера')
                ->addViolation();
        }
    }
}
