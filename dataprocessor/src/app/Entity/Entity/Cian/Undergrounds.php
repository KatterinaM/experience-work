<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Undergrounds
 * @package App\Entity\Cian
 */
class Undergrounds
{
    const TRANSPORT_TYPE_TRANSPORT = 'transport';
    const TRANSPORT_TYPE_WALK = 'walk';

    const TRANSPORT_TYPE = [
        self::TRANSPORT_TYPE_TRANSPORT,
        self::TRANSPORT_TYPE_WALK,
    ];

    /**
     * @var string
     * @Serializer\SerializedName("TransportType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Undergrounds::TRANSPORT_TYPE)
     */
    private $transportType;

    /**
     * @var int
     * @Serializer\SerializedName("Time")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $time;

    /**
     * @var int
     * @Serializer\SerializedName("Id")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $undergroundsId;

    /**
     * @return string
     */
    public function getTransportType(): string
    {
        return $this->transportType;
    }

    /**
     * @param string $transportType
     */
    public function setTransportType(string $transportType): void
    {
        $this->transportType = $transportType;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    /**
     * @return int
     */
    public function getUndergroundsId(): int
    {
        return $this->undergroundsId;
    }

    /**
     * @param int $undergroundsId
     */
    public function setUndergroundsId(int $undergroundsId): void
    {
        $this->undergroundsId = $undergroundsId;
    }
}