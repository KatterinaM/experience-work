<?php

namespace App\Entity\Yandex\Realty;

use DateTime;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Vas
 * @package App\Entity\Yandex\Realty
 */
class Vas
{
    const VAS_TYPE_PREMIUM = 'premium';
    const VAS_TYPE_RAISE = 'raise';
    const VAS_TYPE_PROMOTION = 'promotion';

    const VAS_TYPES = [
        self::VAS_TYPE_PREMIUM,
        self::VAS_TYPE_RAISE,
        self::VAS_TYPE_PROMOTION,
    ];

    /**
     * @var DateTime
     * @Serializer\SerializedName("start-time")
     * @Serializer\XmlAttribute()
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("DateTime")
     */
    private $startTime;

    /**
     * @var string
     * @Serializer\SerializedName("type")
     * @Serializer\XmlValue(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Vas::VAS_TYPES)
     */
    private $value;

    /**
     * @return DateTime
     */
    public function getStartTime(): ?DateTime
    {
        return $this->startTime;
    }

    /**
     * @param DateTime $startTime
     */
    public function setStartTime(DateTime $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
