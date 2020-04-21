<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class ExtraData
 * @package App\Entity\Cian
 */
class ExtraData
{
    /**
     * @var string
     * @Serializer\SerializedName("HomeOwnerName")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $homeOwnerName;

    /**
     * @var string
     * @Serializer\SerializedName("HomeOwnerPhone")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $homeOwnerPhone;

    /**
     * @var string
     * @Serializer\SerializedName("ExactAddress")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $exactAddress;

    /**
     * @var string
     * @Serializer\SerializedName("CadastralNumber")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $extraDataCadastralNumber;

    /**
     * @return string
     */
    public function getHomeOwnerName(): string
    {
        return $this->homeOwnerName;
    }

    /**
     * @param string $homeOwnerName
     */
    public function setHomeOwnerName(string $homeOwnerName): void
    {
        $this->homeOwnerName = $homeOwnerName;
    }

    /**
     * @return string
     */
    public function getHomeOwnerPhone(): string
    {
        return $this->homeOwnerPhone;
    }

    /**
     * @param string $homeOwnerPhone
     */
    public function setHomeOwnerPhone(string $homeOwnerPhone): void
    {
        $this->homeOwnerPhone = $homeOwnerPhone;
    }

    /**
     * @return string
     */
    public function getExactAddress(): string
    {
        return $this->exactAddress;
    }

    /**
     * @param string $exactAddress
     */
    public function setExactAddress(string $exactAddress): void
    {
        $this->exactAddress = $exactAddress;
    }

    /**
     * @return string
     */
    public function getExtraDataCadastralNumber(): string
    {
        return $this->extraDataCadastralNumber;
    }

    /**
     * @param string $extraDataCadastralNumber
     */
    public function setExtraDataCadastralNumber(string $extraDataCadastralNumber): void
    {
        $this->extraDataCadastralNumber = $extraDataCadastralNumber;
    }
}