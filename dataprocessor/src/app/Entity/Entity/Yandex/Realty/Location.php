<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Location
 * @package App\Entity\Yandex\Realty
 */
class Location
{
    const COUNTRY_RUSSIA = 'Россия';

    /**
     * @var string
     * @Serializer\SerializedName("country")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("string")
     */
    private $country = self::COUNTRY_RUSSIA;

    /**
     * @var string
     * @Serializer\SerializedName("region")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $region;

    /**
     * @var string
     * @Serializer\SerializedName("district")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $district;

    /**
     * @var string
     * @Serializer\SerializedName("locality-name")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $localityName;

    /**
     * @var string
     * @Serializer\SerializedName("sub-locality-name")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $subLocalityName;

    /**
     * @var string
     * @Serializer\SerializedName("address")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\Type("string")
     */
    private $address;

    /**
     * @var string
     * @Serializer\SerializedName("direction")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $direction;

    /**
     * @var float
     * @Serializer\SerializedName("latitude")
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("float")
     */
    private $latitude;

    /**
     * @var float
     * @Serializer\SerializedName("longitude")
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("float")
     */
    private $longitude;

    /**
     * @var Metro
     * @Serializer\SerializedName("metro")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("App\Entity\Yandex\Realty\Metro")
     */
    private $metro;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getLocalityName(): string
    {
        return $this->localityName;
    }

    /**
     * @param string $localityName
     */
    public function setLocalityName(string $localityName): void
    {
        $this->localityName = $localityName;
    }

    /**
     * @return string
     */
    public function getSubLocalityName(): string
    {
        return $this->subLocalityName;
    }

    /**
     * @param string $subLocalityName
     */
    public function setSubLocalityName(string $subLocalityName): void
    {
        $this->subLocalityName = $subLocalityName;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return Metro
     */
    public function getMetro(): ?Metro
    {
        return $this->metro;
    }

    /**
     * @param Metro $metro
     */
    public function setMetro(Metro $metro): void
    {
        $this->metro = $metro;
    }
}
