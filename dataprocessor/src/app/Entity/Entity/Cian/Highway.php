<?php


namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Highway
 * @package App\Entity\Cian
 */
class Highway
{
    /**
     * @var double
     * @Serializer\SerializedName("Distance")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $distance;

    /**
     * @var int
     * @Serializer\SerializedName("Id")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $highwayId;

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     */
    public function setDistance(float $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getHighwayId(): int
    {
        return $this->highwayId;
    }

    /**
     * @param int $highwayId
     */
    public function setHighwayId(int $highwayId): void
    {
        $this->highwayId = $highwayId;
    }
}