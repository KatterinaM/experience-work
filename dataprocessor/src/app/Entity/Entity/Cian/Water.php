<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Water
 * @package App\Entity\Cian
 */
class Water
{
    const WATER_LOCATION_TYPE = [
        self::WATER_LOCATION_TYPE_BORDER,
        self::WATER_LOCATION_TYPE_LOCATION,
        self::WATER_LOCATION_TYPE_NO
    ];

    const WATER_LOCATION_TYPE_BORDER = "border";
    const WATER_LOCATION_TYPE_LOCATION = "location";
    const WATER_LOCATION_TYPE_NO = "no";

    const WATER_TYPE = [
        self::WATER_TYPE_AUTONOMOUS,
        self::WATER_TYPE_CENTRAL,
        self::WATER_TYPE_PUMPING_STATION,
        self::WATER_TYPE_WATER_INTAKE_FACILITY,
        self::WATER_TYPE_WATER_TOWER,
    ];

    const WATER_TYPE_AUTONOMOUS = "autonomous";
    const WATER_TYPE_CENTRAL = "central";
    const WATER_TYPE_PUMPING_STATION = "pumpingStation";
    const WATER_TYPE_WATER_INTAKE_FACILITY = "waterIntakeFacility";
    const WATER_TYPE_WATER_TOWER = "waterTower";

    /**
     * @var string
     * @Serializer\SerializedName("LocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Water::WATER_LOCATION_TYPE)
     */
    private $waterLocationType;

    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToConnect")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $waterPossibleToConnect;

    /**
     * @var int
     * @Serializer\SerializedName("Capacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $waterCapacity;

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Water::WATER_TYPE)
     */
    private $waterType;

    /**
     * @return string
     */
    public function getWaterLocationType(): string
    {
        return $this->waterLocationType;
    }

    /**
     * @param string $waterLocationType
     */
    public function setWaterLocationType(string $waterLocationType): void
    {
        $this->waterLocationType = $waterLocationType;
    }

    /**
     * @return bool
     */
    public function isWaterPossibleToConnect(): bool
    {
        return $this->waterPossibleToConnect;
    }

    /**
     * @param bool $waterPossibleToConnect
     */
    public function setWaterPossibleToConnect(bool $waterPossibleToConnect): void
    {
        $this->waterPossibleToConnect = $waterPossibleToConnect;
    }

    /**
     * @return int
     */
    public function getWaterCapacity(): int
    {
        return $this->waterCapacity;
    }

    /**
     * @param int $waterCapacity
     */
    public function setWaterCapacity(int $waterCapacity): void
    {
        $this->waterCapacity = $waterCapacity;
    }

    /**
     * @return string
     */
    public function getWaterType(): string
    {
        return $this->waterType;
    }

    /**
     * @param string $waterType
     */
    public function setWaterType(string $waterType): void
    {
        $this->waterType = $waterType;
    }
}