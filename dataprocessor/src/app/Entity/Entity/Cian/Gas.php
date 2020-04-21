<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Gas
 * @package App\Entity\Cian
 */
class Gas
{
    const GAS_LOCATION_TYPE = [
        self::GAS_LOCATION_TYPE_BORDER,
        self::GAS_LOCATION_TYPE_LOCATION,
        self::GAS_LOCATION_TYPE_NO
    ];

    const GAS_LOCATION_TYPE_BORDER = "border";
    const GAS_LOCATION_TYPE_LOCATION = "location";
    const GAS_LOCATION_TYPE_NO = "no";


    const PRESSURE_TYPE = [
        self::PRESSURE_TYPE_HIGH,
        self::PRESSURE_TYPE_LOW,
        self::PRESSURE_TYPE_MIDDLE
    ];

    const PRESSURE_TYPE_HIGH = "high";
    const PRESSURE_TYPE_LOW = "low";
    const PRESSURE_TYPE_MIDDLE = "middle";
    
    /**
     * @var string
     * @Serializer\SerializedName("LocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Gas::GAS_LOCATION_TYPE)
     */
    private $gasLocationType;

    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToConnect")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $gasPossibleToConnect;

    /**
     * @var int
     * @Serializer\SerializedName("Capacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $gasCapacity;

    /**
     * @var string
     * @Serializer\SerializedName("PressureType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Gas::PRESSURE_TYPE)
     */
    private $pressureType;

    /**
     * @return string
     */
    public function getGasLocationType(): string
    {
        return $this->gasLocationType;
    }

    /**
     * @param string $gasLocationType
     */
    public function setGasLocationType(string $gasLocationType): void
    {
        $this->gasLocationType = $gasLocationType;
    }

    /**
     * @return bool
     */
    public function isGasPossibleToConnect(): bool
    {
        return $this->gasPossibleToConnect;
    }

    /**
     * @param bool $gasPossibleToConnect
     */
    public function setGasPossibleToConnect(bool $gasPossibleToConnect): void
    {
        $this->gasPossibleToConnect = $gasPossibleToConnect;
    }

    /**
     * @return int
     */
    public function getGasCapacity(): int
    {
        return $this->gasCapacity;
    }

    /**
     * @param int $gasCapacity
     */
    public function setGasCapacity(int $gasCapacity): void
    {
        $this->gasCapacity = $gasCapacity;
    }

    /**
     * @return string
     */
    public function getPressureType(): string
    {
        return $this->pressureType;
    }

    /**
     * @param string $pressureType
     */
    public function setPressureType(string $pressureType): void
    {
        $this->pressureType = $pressureType;
    }
}