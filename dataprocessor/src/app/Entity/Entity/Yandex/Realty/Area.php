<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Area
 * @package App\Entity\Yandex\Realty
 */
class Area
{
    const UNIT_SQM = 'sq.m';
    const UNIT_100 = 'сотка';
    const UNIT_HECTARE = 'hectare';

    const UNITS = [
        self::UNIT_SQM,
        self::UNIT_100,
        self::UNIT_HECTARE,
    ];

    /**
     * @var float
     * @Serializer\SerializedName("value")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("float")
     * @Constraints\GreaterThan(0)
     */
    private $value;

    /**
     * @var string
     * @Serializer\SerializedName("unit")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Area::UNITS)
     */
    private $unit;

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }
}
