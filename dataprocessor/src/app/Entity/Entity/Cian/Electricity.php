<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\ConditionsCommercialRealtyInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Electricity
 * @package App\Entity\Cian
 */
class Electricity
{
    const ELECTRICITY_LOCATION_TYPE = [
        self::ELECTRICITY_LOCATION_TYPE_BORDER,
        self::ELECTRICITY_LOCATION_TYPE_LOCATION,
        self::ELECTRICITY_LOCATION_TYPE_TYPE_NO
    ];

    const ELECTRICITY_LOCATION_TYPE_BORDER = "border";
    const ELECTRICITY_LOCATION_TYPE_LOCATION = "location";
    const ELECTRICITY_LOCATION_TYPE_TYPE_NO = "no";

    /**
     * @var string
     * @Serializer\SerializedName("LocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Electricity::ELECTRICITY_LOCATION_TYPE)
     */
    private $electricityLocationType;


    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToConnect")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $electricityPossibleToConnect;

    /**
     * @var int
     * @Serializer\SerializedName("Power")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $electricityPower;

    /**
     * @return string
     */
    public function getElectricityLocationType(): string
    {
        return $this->electricityLocationType;
    }

    /**
     * @param string $electricityLocationType
     */
    public function setElectricityLocationType(string $electricityLocationType): void
    {
        $this->electricityLocationType = $electricityLocationType;
    }

    /**
     * @return bool
     */
    public function isElectricityPossibleToConnect(): bool
    {
        return $this->electricityPossibleToConnect;
    }

    /**
     * @param bool $electricityPossibleToConnect
     */
    public function setElectricityPossibleToConnect(bool $electricityPossibleToConnect): void
    {
        $this->electricityPossibleToConnect = $electricityPossibleToConnect;
    }

    /**
     * @return int
     */
    public function getElectricityPower(): int
    {
        return $this->electricityPower;
    }

    /**
     * @param int $electricityPower
     */
    public function setElectricityPower(int $electricityPower): void
    {
        $this->electricityPower = $electricityPower;
    }
}