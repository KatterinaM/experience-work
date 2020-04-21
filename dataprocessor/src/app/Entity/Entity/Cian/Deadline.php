<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\BuildingInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Deadline
 * @package App\Entity\Cian
 */
class Deadline
{
    const QUARTER = [
        self::QUARTER_FIRST,
        self::QUARTER_SECOND,
        self::QUARTER_THIRD,
        self::QUARTER_FOURTH
    ];

    const QUARTER_FIRST = "first";
    const QUARTER_SECOND = "second";
    const QUARTER_THIRD = "third";
    const QUARTER_FOURTH = "fourth";

    /**
     * @var string
     * @Serializer\SerializedName("Quarter")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\BuildingInterface::QUARTER)
     * @Constraints\Valid()
     */
    private $quarter;

    /**
     * @var int
     * @Serializer\SerializedName("Year")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $year;

    /**
     * @var bool
     * @Serializer\SerializedName("IsComplete")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $isComplete;

    /**
     * @return string
     */
    public function getQuarter(): string
    {
        return $this->quarter;
    }

    /**
     * @param string $quarter
     */
    public function setQuarter(string $quarter): void
    {
        $this->quarter = $quarter;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->isComplete;
    }

    /**
     * @param bool $isComplete
     */
    public function setIsComplete(bool $isComplete): void
    {
        $this->isComplete = $isComplete;
    }
}