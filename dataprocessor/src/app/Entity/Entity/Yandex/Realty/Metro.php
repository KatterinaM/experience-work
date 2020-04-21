<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Metro
 * @package App\Entity\Yandex\Realty
 */
class Metro
{
    /**
     * @var string
     * @Serializer\SerializedName("name")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("string")
     */
    private $name;

    /**
     * @var int
     * @Serializer\SerializedName("time-on-transport")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $timeOnTransport;

    /**
     * @var int
     * @Serializer\SerializedName("time-on-foot")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $timeOnFoot;

    /**
     * @var string
     * @Serializer\SerializedName("railway-station")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $railwayStation;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getTimeOnTransport(): int
    {
        return $this->timeOnTransport;
    }

    /**
     * @param int $timeOnTransport
     */
    public function setTimeOnTransport(int $timeOnTransport): void
    {
        $this->timeOnTransport = $timeOnTransport;
    }

    /**
     * @return int
     */
    public function getTimeOnFoot(): int
    {
        return $this->timeOnFoot;
    }

    /**
     * @param int $timeOnFoot
     */
    public function setTimeOnFoot(int $timeOnFoot): void
    {
        $this->timeOnFoot = $timeOnFoot;
    }

    /**
     * @return string
     */
    public function getRailwayStation(): int
    {
        return $this->railwayStation;
    }

    /**
     * @param string $railwayStation
     */
    public function setRailwayStation(string $railwayStation): void
    {
        $this->railwayStation = $railwayStation;
    }
}
