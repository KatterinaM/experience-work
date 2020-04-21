<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class OpeningHours
 * @package App\Entity\Cian
 */
class OpeningHours
{
    const OPENING_HOURS_TYPE = [
        self::OPENING_HOURS_TYPE_ROUND_THE_CLOCK,
        self::OPENING_HOURS_TYPE_SPECIFIC,
    ];

    const OPENING_HOURS_TYPE_ROUND_THE_CLOCK = "roundTheClock";
    const OPENING_HOURS_TYPE_SPECIFIC = "specific";

    /**
     * @var string
     * @Serializer\SerializedName("From")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $from;

    /**
     * @var string
     * @Serializer\SerializedName("To")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $to;

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\OpeningHours::OPENING_HOURS_TYPE)
     * @Constraints\Valid()
     */
    private $openingHoursType;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getOpeningHoursType(): string
    {
        return $this->openingHoursType;
    }

    /**
     * @param string $openingHoursType
     */
    public function setOpeningHoursType(string $openingHoursType): void
    {
        $this->openingHoursType = $openingHoursType;
    }
}