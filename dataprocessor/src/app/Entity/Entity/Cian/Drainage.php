<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Drainage
 * @package App\Entity\Cian
 */
class Drainage
{
    const DRAINAGE_LOCATION_TYPE = [
        self::DRAINAGE_LOCATION_TYPE_BORDER,
        self::DRAINAGE_LOCATION_TYPE_LOCATION,
        self::DRAINAGE_LOCATION_TYPE_NO
    ];

    const DRAINAGE_LOCATION_TYPE_BORDER = "border";
    const DRAINAGE_LOCATION_TYPE_LOCATION = "location";
    const DRAINAGE_LOCATION_TYPE_NO = "no";

    const DRAINAGE_TYPE = [
        self::DRAINAGE_TYPE_AUTONOMOUS,
        self::DRAINAGE_TYPE_CENTRAL,
    ];

    const DRAINAGE_TYPE_AUTONOMOUS = "autonomous";
    const DRAINAGE_TYPE_CENTRAL = "central";

    /**
     * @var string
     * @Serializer\SerializedName("LocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Drainage::DRAINAGE_LOCATION_TYPE)
     */
    private $drainageLocationType;

    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToConnect")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $drainagePossibleToConnect;

    /**
     * @var int
     * @Serializer\SerializedName("Capacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $drainageCapacity;

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Drainage::DRAINAGE_TYPE)
     */
    private $drainageType;

    /**
     * @return string
     */
    public function getDrainageLocationType(): string
    {
        return $this->drainageLocationType;
    }

    /**
     * @param string $drainageLocationType
     */
    public function setDrainageLocationType(string $drainageLocationType): void
    {
        $this->drainageLocationType = $drainageLocationType;
    }

    /**
     * @return bool
     */
    public function isDrainagePossibleToConnect(): bool
    {
        return $this->drainagePossibleToConnect;
    }

    /**
     * @param bool $drainagePossibleToConnect
     */
    public function setDrainagePossibleToConnect(bool $drainagePossibleToConnect): void
    {
        $this->drainagePossibleToConnect = $drainagePossibleToConnect;
    }

    /**
     * @return int
     */
    public function getDrainageCapacity(): int
    {
        return $this->drainageCapacity;
    }

    /**
     * @param int $drainageCapacity
     */
    public function setDrainageCapacity(int $drainageCapacity): void
    {
        $this->drainageCapacity = $drainageCapacity;
    }

    /**
     * @return string
     */
    public function getDrainageType(): string
    {
        return $this->drainageType;
    }

    /**
     * @param string $drainageType
     */
    public function setDrainageType(string $drainageType): void
    {
        $this->drainageType = $drainageType;
    }
}