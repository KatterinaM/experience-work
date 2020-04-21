<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AgentBonus
 * @package App\Entity\Cian
 */
class AgentBonus
{
    const CURRENCY = [
        self::CURRENCY_EUR,
        self::CURRENCY_RUR,
        self::CURRENCY_USD
    ];

    const CURRENCY_EUR = "eur";
    const CURRENCY_RUR = "rur";
    const CURRENCY_USD = "usd";

    const PAYMENT_TYPE = [
        self::PAYMENT_TYPE_FIXED,
        self::PAYMENT_TYPE_PERCENT
    ];

    const PAYMENT_TYPE_FIXED = "fixed";
    const PAYMENT_TYPE_PERCENT = "percent";

    /**
     * @var double
     * @Serializer\SerializedName("BargainPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $bargainPrice;

    /**
     * @var string
     * @Serializer\SerializedName("PaymentType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\AgentBonus::PAYMENT_TYPE)
     * @Constraints\Valid()
     */
    private $paymentType;

    /**
     * @var string
     * @Serializer\SerializedName("Currency")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\AgentBonus::CURRENCY)
     * @Constraints\Valid()
     */
    private $currency;

    /**
     * @return float
     */
    public function getBargainPrice(): float
    {
        return $this->bargainPrice;
    }

    /**
     * @param float $bargainPrice
     */
    public function setBargainPrice(float $bargainPrice): void
    {
        $this->bargainPrice = $bargainPrice;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    public function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }
}