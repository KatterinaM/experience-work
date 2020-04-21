<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class AreaParts
 * @package App\Entity\Cian
 */
class AreaParts
{
    /**
     * @var double
     * @Serializer\SerializedName("Area")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $area;

    /**
     * @var double
     * @Serializer\SerializedName("Price")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $price;

    /**
     * @var double
     * @Serializer\SerializedName("VatPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $vatPrice;

    /**
     * @return float
     */
    public function getArea(): float
    {
        return $this->area;
    }

    /**
     * @param float $area
     */
    public function setArea(float $area): void
    {
        $this->area = $area;
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
     * @return float
     */
    public function getVatPrice(): float
    {
        return $this->vatPrice;
    }

    /**
     * @param float $vatPrice
     */
    public function setVatPrice(float $vatPrice): void
    {
        $this->vatPrice = $vatPrice;
    }
}