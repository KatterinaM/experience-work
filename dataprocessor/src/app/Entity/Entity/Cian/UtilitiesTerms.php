<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class UtilitiesTerms
 * @package App\Entity\Cian
 */
class UtilitiesTerms
{
    /**
     * @var bool
     * @Serializer\SerializedName("IncludedInPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $includedInPrice;

    /**
     * @var double
     * @Serializer\SerializedName("Price")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $price;

    /**
     * @var bool
     * @Serializer\SerializedName("FlowMetersNotIncludedInPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $flowMetersNotIncludedInPrice;

    /**
     * @return bool
     */
    public function isIncludedInPrice(): bool
    {
        return $this->includedInPrice;
    }

    /**
     * @param bool $includedInPrice
     */
    public function setIncludedInPrice(bool $includedInPrice): void
    {
        $this->includedInPrice = $includedInPrice;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isFlowMetersNotIncludedInPrice(): bool
    {
        return $this->flowMetersNotIncludedInPrice;
    }

    /**
     * @param bool $flowMetersNotIncludedInPrice
     */
    public function setFlowMetersNotIncludedInPrice(bool $flowMetersNotIncludedInPrice): void
    {
        $this->flowMetersNotIncludedInPrice = $flowMetersNotIncludedInPrice;
    }
}