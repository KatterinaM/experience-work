<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Entity\Cian\Traits\BaseCategoryType;
use App\Entity\Cian\Traits\CommercialCategoryType;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class BargainTermsInfo
 * @package App\Entity\Cian
 */
class BargainTermsInfo
{
    use CommercialCategoryType;

    const PRICE_TYPE = [
        self::PRICE_TYPE_ALL,
        self::PRICE_TYPE_HECTARE,
        self::PRICE_TYPE_SOTKA,
        self::PRICE_TYPE_SQUARE_METER
    ];

    const PRICE_TYPE_ALL = "all";
    const PRICE_TYPE_HECTARE = "hectare";
    const PRICE_TYPE_SOTKA = "sotka";
    const PRICE_TYPE_SQUARE_METER = "squareMeter";

    const CURRENCY = [
        self::CURRENCY_EUR,
        self::CURRENCY_RUR,
        self::CURRENCY_USD
    ];

    const CURRENCY_EUR = "eur";
    const CURRENCY_RUR = "rur";
    const CURRENCY_USD = "usd";

    const LEASE_TERM_TYPE = [
        self::LEASE_TERM_TYPE_FEW_MONTHS,
        self::LEASE_TERM_TYPE_LONG_TERM
    ];

    const LEASE_TERM_TYPE_FEW_MONTHS = "fewMonths";
    const LEASE_TERM_TYPE_LONG_TERM = "longTerm";

    const TENANTS_TYPE = [
        self::TENANTS_TYPE_ANY,
        self::TENANTS_TYPE_FAMILY,
        self::TENANTS_TYPE_FEMALE,
        self::TENANTS_TYPE_MALE
    ];

    const TENANTS_TYPE_ANY = "any";
    const TENANTS_TYPE_FAMILY = "family";
    const TENANTS_TYPE_FEMALE = "female";
    const TENANTS_TYPE_MALE = "male";

    const PAYMENT_PERIOD = [
        self::PAYMENT_PERIOD_ANNUAL,
        self::PAYMENT_PERIOD_MONTHLY
    ];

    const PAYMENT_PERIOD_ANNUAL = "annual";
    const PAYMENT_PERIOD_MONTHLY = "monthly";

    const LEASE_TYPE = [
        self::LEASE_TYPE_DIRECT,
        self::LEASE_TYPE_SUBLEASE
    ];

    const LEASE_TYPE_DIRECT = "direct";
    const LEASE_TYPE_SUBLEASE = "sublease";

    const VAT_TYPE = [
        self::VAT_TYPE_INCLUDED,
        self::VAT_TYPE_NOT_INCLUDED,
        self::VAT_TYPE_USN,
        self::VAT_TYPE_VAT_INCLUDED,
        self::VAT_TYPE_VAT_NOT_INCLUDED
    ];

    const VAT_TYPE_INCLUDED = "included";
    const VAT_TYPE_NOT_INCLUDED = "notIncluded";
    const VAT_TYPE_USN = "usn";
    const VAT_TYPE_VAT_INCLUDED = "notIncluded";
    const VAT_TYPE_VAT_NOT_INCLUDED = "vatNotIncluded";

    const SALE_TYPE = [
        self::SALE_TYPE_ALTERNATIVE,
        self::SALE_TYPE_FREE
    ];

    const SALE_TYPE_ALTERNATIVE = "alternative";
    const SALE_TYPE_FREE = "free";

    const CONTRACT_TYPE = [
        self::CONTRACT_TYPE_LEASE_ASSIGNMENT,
        self::CONTRACT_TYPE_LEASE_SALE
    ];

    const CONTRACT_TYPE_LEASE_ASSIGNMENT = "leaseAssignment";
    const CONTRACT_TYPE_LEASE_SALE = "sale";

    /**
     * @var double
     * @Serializer\SerializedName("Price")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     */
    private $price;

    /**
     * @var string
     * @Serializer\SerializedName("PriceType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validatePriceType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::PRICE_TYPE)
     * @Constraints\Valid()
     */
    private $priceType;

    /**
     * @var UtilitiesTerms
     * @Serializer\SerializedName("UtilitiesTerms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateUtilitiesTerms" })
     * @Constraints\Type("App\Entity\Cian\UtilitiesTerms")
     * @Constraints\Valid()
     */
    private $utilitiesTerms;


    /**
     * @var string
     * @Serializer\SerializedName("Currency")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::CURRENCY)
     * @Constraints\Valid()
     */
    private $currency;

    /**
     * @var bool
     * @Serializer\SerializedName("BargainAllowed")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateBargainAllowed" })
     * @Constraints\Type("bool")
     */
    private $bargainAllowed;

    /**
     * @var double
     * @Serializer\SerializedName("BargainPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateBargainPrice" })
     */
    private $bargainPrice;

    /**
     * @var string
     * @Serializer\SerializedName("BargainConditions")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateBargainConditions" })
     */
    private $bargainConditions;

    /**
     * @var string
     * @Serializer\SerializedName("LeaseTermType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateLeaseTermType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::LEASE_TERM_TYPE)
     * @Constraints\Valid()
     */
    private $leaseTermType;


    /**
     * @var int
     * @Serializer\SerializedName("PrepayMonths")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\GreaterThan(0)
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validatePrepayMonths" })
     */
    private $prepayMonths;

    /**
     * @var int
     * @Serializer\SerializedName("Deposit")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateDeposit" })
     */
    private $deposit;

    /**
     * @var string
     * @Serializer\SerializedName("TenantsType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateTenantsType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::TENANTS_TYPE)
     * @Constraints\Valid()
     */
    private $tenantsType;

    /**
     * @var int
     * @Serializer\SerializedName("ClientFee")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateClientFee" })
     */
    private $clientFee;

    /**
     * @var int
     * @Serializer\SerializedName("AgentFee")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateAgentFee" })
     */
    private $agentFee;

    /**
     * @var AgentBonus
     * @Serializer\SerializedName("AgentBonus")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\AgentBonus")
     * @Constraints\Valid()
     */
    private $agentBonus;

    /**
     * @var string
     * @Serializer\SerializedName("PaymentPeriod")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validatePaymentPeriod" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::PAYMENT_PERIOD)
     * @Constraints\Valid()
     */
    private $paymentPeriod;

    /**
     * @var string
     * @Serializer\SerializedName("LeaseType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateLeaseType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::LEASE_TYPE)
     * @Constraints\Valid()
     */
    private $leaseType;

    /**
     * @var IncludedOptionsEnum
     * @Serializer\SerializedName("IncludedOptions")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\IncludedOptionsEnum")
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateIncludedOptions" })
     */
    private $includedOptions;

    /**
     * @var int
     * @Serializer\SerializedName("MinLeaseTerm")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateMinLeaseTerm" })
     */
    private $minLeaseTerm;

    /**
     * @var int
     * @Serializer\SerializedName("SecurityDeposit")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateSecurityDeposit" })
     */
    private $securityDeposit;

    /**
     * @var string
     * @Serializer\SerializedName("VatType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateVatType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::VAT_TYPE)
     * @Constraints\Valid()
     */
    private $vatType;

    /**
     * @var double
     * @Serializer\SerializedName("VatPrice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateBargainVatPrice" })
     */
    private $bargainVatPrice;

    /**
     * @var bool
     * @Serializer\SerializedName("HasGracePeriod")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateHasGracePeriod" })
     * @Constraints\Type("bool")
     */
    private $hasGracePeriod;

    /**
     * @var bool
     * @Serializer\SerializedName("MortgageAllowed")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateMortgageAllowed" })
     * @Constraints\Type("bool")
     */
    private $mortgageAllowed;

    /**
     * @var string
     * @Serializer\SerializedName("SaleType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateSaleType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::SALE_TYPE)
     * @Constraints\Valid()
     */
    private $saleType;

    /**
     * @var string
     * @Serializer\SerializedName("ActionId")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateActionId" })
     */
    private $actionId;

    /**
     * @var string
     * @Serializer\SerializedName("ContractType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BargainTermsInfo", "validateContractType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BargainTermsInfo::CONTRACT_TYPE)
     * @Constraints\Valid()
     */
    private $contractType;

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
     * @return string
     */
    public function getPriceType(): string
    {
        return $this->priceType;
    }

    /**
     * @param string $priceType
     */
    public function setPriceType(string $priceType): void
    {
        $this->priceType = $priceType;
    }

    /**
     * @return UtilitiesTerms
     */
    public function getUtilitiesTerms(): UtilitiesTerms
    {
        return $this->utilitiesTerms;
    }

    /**
     * @param UtilitiesTerms $utilitiesTerms
     */
    public function setUtilitiesTerms(UtilitiesTerms $utilitiesTerms): void
    {
        $this->utilitiesTerms = $utilitiesTerms;
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
     * @return bool
     */
    public function isBargainAllowed(): bool
    {
        return $this->bargainAllowed;
    }

    /**
     * @param bool $bargainAllowed
     */
    public function setBargainAllowed(bool $bargainAllowed): void
    {
        $this->bargainAllowed = $bargainAllowed;
    }

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
    public function getBargainConditions(): string
    {
        return $this->bargainConditions;
    }

    /**
     * @param string $bargainConditions
     */
    public function setBargainConditions(string $bargainConditions): void
    {
        $this->bargainConditions = $bargainConditions;
    }

    /**
     * @return string
     */
    public function getLeaseTermType(): string
    {
        return $this->leaseTermType;
    }

    /**
     * @param string $leaseTermType
     */
    public function setLeaseTermType(string $leaseTermType): void
    {
        $this->leaseTermType = $leaseTermType;
    }

    /**
     * @return int
     */
    public function getPrepayMonths(): int
    {
        return $this->prepayMonths;
    }

    /**
     * @param int $prepayMonths
     */
    public function setPrepayMonths(int $prepayMonths): void
    {
        $this->prepayMonths = $prepayMonths;
    }

    /**
     * @return int
     */
    public function getDeposit(): int
    {
        return $this->deposit;
    }

    /**
     * @param int $deposit
     */
    public function setDeposit(int $deposit): void
    {
        $this->deposit = $deposit;
    }

    /**
     * @return string
     */
    public function getTenantsType(): string
    {
        return $this->tenantsType;
    }

    /**
     * @param string $tenantsType
     */
    public function setTenantsType(string $tenantsType): void
    {
        $this->tenantsType = $tenantsType;
    }

    /**
     * @return int
     */
    public function getClientFee(): int
    {
        return $this->clientFee;
    }

    /**
     * @param int $clientFee
     */
    public function setClientFee(int $clientFee): void
    {
        $this->clientFee = $clientFee;
    }

    /**
     * @return int
     */
    public function getAgentFee(): int
    {
        return $this->agentFee;
    }

    /**
     * @param int $agentFee
     */
    public function setAgentFee(int $agentFee): void
    {
        $this->agentFee = $agentFee;
    }

    /**
     * @return AgentBonus
     */
    public function getAgentBonus(): AgentBonus
    {
        return $this->agentBonus;
    }

    /**
     * @param AgentBonus $agentBonus
     */
    public function setAgentBonus(AgentBonus $agentBonus): void
    {
        $this->agentBonus = $agentBonus;
    }

    /**
     * @return string
     */
    public function getPaymentPeriod(): string
    {
        return $this->paymentPeriod;
    }

    /**
     * @param string $paymentPeriod
     */
    public function setPaymentPeriod(string $paymentPeriod): void
    {
        $this->paymentPeriod = $paymentPeriod;
    }

    /**
     * @return string
     */
    public function getLeaseType(): string
    {
        return $this->leaseType;
    }

    /**
     * @param string $leaseType
     */
    public function setLeaseType(string $leaseType): void
    {
        $this->leaseType = $leaseType;
    }

    /**
     * @return IncludedOptionsEnum
     */
    public function getIncludedOptions(): IncludedOptionsEnum
    {
        return $this->includedOptions;
    }

    /**
     * @param IncludedOptionsEnum $includedOptions
     */
    public function setIncludedOptions(IncludedOptionsEnum $includedOptions): void
    {
        $this->includedOptions = $includedOptions;
    }

    /**
     * @return int
     */
    public function getMinLeaseTerm(): int
    {
        return $this->minLeaseTerm;
    }

    /**
     * @param int $minLeaseTerm
     */
    public function setMinLeaseTerm(int $minLeaseTerm): void
    {
        $this->minLeaseTerm = $minLeaseTerm;
    }

    /**
     * @return int
     */
    public function getSecurityDeposit(): int
    {
        return $this->securityDeposit;
    }

    /**
     * @param int $securityDeposit
     */
    public function setSecurityDeposit(int $securityDeposit): void
    {
        $this->securityDeposit = $securityDeposit;
    }

    /**
     * @return string
     */
    public function getVatType(): string
    {
        return $this->vatType;
    }

    /**
     * @param string $vatType
     */
    public function setVatType(string $vatType): void
    {
        $this->vatType = $vatType;
    }

    /**
     * @return float
     */
    public function getBargainVatPrice(): float
    {
        return $this->bargainVatPrice;
    }

    /**
     * @param float $bargainVatPrice
     */
    public function setBargainVatPrice(float $bargainVatPrice): void
    {
        $this->bargainVatPrice = $bargainVatPrice;
    }

    /**
     * @return bool
     */
    public function isHasGracePeriod(): bool
    {
        return $this->hasGracePeriod;
    }

    /**
     * @param bool $hasGracePeriod
     */
    public function setHasGracePeriod(bool $hasGracePeriod): void
    {
        $this->hasGracePeriod = $hasGracePeriod;
    }

    /**
     * @return bool
     */
    public function isMortgageAllowed(): bool
    {
        return $this->mortgageAllowed;
    }

    /**
     * @param bool $mortgageAllowed
     */
    public function setMortgageAllowed(bool $mortgageAllowed): void
    {
        $this->mortgageAllowed = $mortgageAllowed;
    }

    /**
     * @return string
     */
    public function getSaleType(): string
    {
        return $this->saleType;
    }

    /**
     * @param string $saleType
     */
    public function setSaleType(string $saleType): void
    {
        $this->saleType = $saleType;
    }

    /**
     * @return string
     */
    public function getActionId(): string
    {
        return $this->actionId;
    }

    /**
     * @param string $actionId
     */
    public function setActionId(string $actionId): void
    {
        $this->actionId = $actionId;
    }

    /**
     * @return string
     */
    public function getContractType(): string
    {
        return $this->contractType;
    }

    /**
     * @param string $contractType
     */
    public function setContractType(string $contractType): void
    {
        $this->contractType = $contractType;
    }

    /**
     * @param $priceType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePriceType(
        $priceType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var CommercialObject $object */
        $object = $context->getObject();

        if (!is_null($priceType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $utilitiesTerms
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateUtilitiesTerms(
        $utilitiesTerms,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($utilitiesTerms) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $bargainAllowed
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBargainAllowed(
        $bargainAllowed,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bargainAllowed) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $bargainPrice
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBargainPrice(
        $bargainPrice,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bargainPrice) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $bargainConditions
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBargainConditions(
        $bargainConditions,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bargainConditions) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $leaseTermType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLeaseTermType(
        $leaseTermType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($leaseTermType) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской", "Загородной" и  "Коммерческой" недвижимости'
            )->addViolation();
        }
    }


    /**
     * @param $prepayMonths
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePrepayMonths(
        $prepayMonths,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($prepayMonths) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
                    $context->buildViolation(
                        'Данное поле заполняется для типа аренда "Городской", "Загородной" и  "Коммерческой" недвижимости
                        и в диапазоне от 1 до 12 месяцев'
                    )->addViolation();
                }
    }

    /**
     * @param $deposit
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDeposit(
        $deposit,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($deposit) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости и категории "Здание"'
            )->addViolation();
        }
    }

    /**
     * @param $tenantsType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateTenantsType(
        $tenantsType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($tenantsType) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской" и "Загородной" недвижимости, кроме категории "Квартира"'
            )->addViolation();
        }
    }

    /**
     * @param $clientFee
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateClientFee(
        $clientFee,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($clientFee) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской", "Загородной" и  "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $agentFee
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateAgentFee(
        $agentFee,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($agentFee) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Городской", "Загородной" и  "Коммерческой" недвижимости, кроме категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $paymentPeriod
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePaymentPeriod(
        $paymentPeriod,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($paymentPeriod) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $leaseType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLeaseType(
        $leaseType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($leaseType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $includedOptions
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIncludedOptions(
        $includedOptions,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($includedOptions) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $minLeaseTerm
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateMinLeaseTerm(
        $minLeaseTerm,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($minLeaseTerm) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $securityDeposit
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateSecurityDeposit(
        $securityDeposit,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($securityDeposit) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $vatType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateVatType(
        $vatType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($vatType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется типа "Коммерческая" недвижимость и кроме категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $bargainVatPrice
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBargainVatPrice(
        $bargainVatPrice,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bargainVatPrice) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется типа "Коммерческая" недвижимость и кроме категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasGracePeriod
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasGracePeriod(
        $hasGracePeriod,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasGracePeriod) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа аренда "Коммерческой" недвижимости, кроме категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $mortgageAllowed
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateMortgageAllowed(
        $mortgageAllowed,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($mortgageAllowed) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Городской", "Загородной" и  "Коммерческой" недвижимости, кроме категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $saleType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateSaleType(
        $saleType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (is_null($saleType) && in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Городской" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $actionId
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateActionId(
        $actionId,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($actionId) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $contractType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateContractType(
        $contractType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($contractType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Коммерческой" недвижимости кроме категории "Коммерческая земля"'
            )->addViolation();
        }
    }
}