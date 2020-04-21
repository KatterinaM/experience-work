<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class IncludedOptionsEnum
 * @package App\Tests\Unit\Entity\Cian
 */
class IncludedOptionsEnum
{
    const INCLUDED_OPTIONS_ENUM = [
        self::INCLUDED_OPTIONS_ENUM_OPERATIONAL_COSTS,
        self::INCLUDED_OPTIONS_ENUM_UTILITY_CHARGES
    ];

    const INCLUDED_OPTIONS_ENUM_OPERATIONAL_COSTS = "operationalCosts";
    const INCLUDED_OPTIONS_ENUM_UTILITY_CHARGES = "utilityCharges";

    /**
     * @var string
     * @Serializer\SerializedName("IncludedOptionsEnum")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\IncludedOptionsEnum::INCLUDED_OPTIONS_ENUM)
     */
    private $includedOptionsEnum;

    /**
     * @return string
     */
    public function getIncludedOptionsEnum(): string
    {
        return $this->includedOptionsEnum;
    }

    /**
     * @param string $includedOptionsEnum
     */
    public function setIncludedOptionsEnum(string $includedOptionsEnum): void
    {
        $this->includedOptionsEnum = $includedOptionsEnum;
    }
}