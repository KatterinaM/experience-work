<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Trait Deal
 * @package App\Entity\Yandex\Realty
 */
class Price
{
    const CURRENCY_RUB = 'RUB';
    const CURRENCY_RUR = 'RUR';
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';

    const CURRENCIES = [
        self::CURRENCY_RUB,
        self::CURRENCY_RUR,
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
    ];

    const PERIOD_DAY = 'day';
    const PERIOD_MONTH = 'month';

    const PERIODS = [
        self::PERIOD_DAY,
        self::PERIOD_MONTH,
    ];

    const TAXATION_FORM_NDS = 'НДС';
    const TAXATION_FORM_USN = 'УСН';

    const TAXATION_FORMS = [
        self::TAXATION_FORM_NDS,
        self::TAXATION_FORM_USN,
    ];

    /**
     * @var int
     * @Serializer\SerializedName("value")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $value;

    /**
     * @var string
     * @Serializer\SerializedName("currency")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Price::CURRENCIES)
     */
    private $currency;

    /**
     * @var string
     * @Serializer\SerializedName("period")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Price::PERIODS)
     */
    private $period;

    /**
     * @var string
     * @Serializer\SerializedName("unit")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Area::UNITS)
     */
    private $unit;

    /**
     * @var int
     * @Serializer\SerializedName("commission")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $commission;

    /**
     * @var int
     * @Serializer\SerializedName("prepayment")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $prepayment;

    /**
     * @var int
     * @Serializer\SerializedName("security-payment")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     * @Constraints\LessThanOrEqual(600)
     */
    private $securityPayment;

    /**
     * @var string
     * @Serializer\SerializedName("taxation-form")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Price::TAXATION_FORMS)
     */
    private $taxationForm;

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
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

    /**
     * @return string
     */
    public function getPeriod(): string
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod(string $period): void
    {
        $this->period = $period;
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

    /**
     * @return int
     */
    public function getCommission(): int
    {
        return $this->commission;
    }

    /**
     * @param int $commission
     */
    public function setCommission(int $commission): void
    {
        $this->commission = $commission;
    }

    /**
     * @return int
     */
    public function getPrepayment(): int
    {
        return $this->prepayment;
    }

    /**
     * @param int $prepayment
     */
    public function setPrepayment(int $prepayment): void
    {
        $this->prepayment = $prepayment;
    }

    /**
     * @return int
     */
    public function getSecurityPayment(): int
    {
        return $this->securityPayment;
    }

    /**
     * @param int $securityPayment
     */
    public function setSecurityPayment(int $securityPayment): void
    {
        $this->securityPayment = $securityPayment;
    }

    /**
     * @return string
     */
    public function getTaxationForm(): string
    {
        return $this->taxationForm;
    }

    /**
     * @param string $taxationForm
     */
    public function setTaxationForm(string $taxationForm): void
    {
        $this->taxationForm = $taxationForm;
    }
}
