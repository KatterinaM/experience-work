<?php

namespace App\Tests\Unit\Entity\Cian;

use App\Entity\Cian\BargainTermsInfo;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use App\Tests\Unit\Entity\ValidationTestCase;

class BargainTermsInfoTest extends ValidationTestCase
{
    private $class;

    private $commercial;

    public function testPriceType()
    {
        $this->assertEquals([
            BargainTermsInfo::PRICE_TYPE_ALL,
            BargainTermsInfo::PRICE_TYPE_HECTARE,
            BargainTermsInfo::PRICE_TYPE_SOTKA,
            BargainTermsInfo::PRICE_TYPE_SQUARE_METER
        ], BargainTermsInfo::PRICE_TYPE);
    }

    public function testCurrency()
    {
        $this->assertEquals([
            BargainTermsInfo::CURRENCY_EUR,
            BargainTermsInfo::CURRENCY_RUR,
            BargainTermsInfo::CURRENCY_USD
        ], BargainTermsInfo::CURRENCY);
    }

    public function testLeaseTermType()
    {
        $this->assertEquals([
            BargainTermsInfo::LEASE_TERM_TYPE_FEW_MONTHS,
            BargainTermsInfo::LEASE_TERM_TYPE_LONG_TERM
        ], BargainTermsInfo::LEASE_TERM_TYPE);
    }

    public function testTenantsType()
    {
        $this->assertEquals([
            BargainTermsInfo::TENANTS_TYPE_ANY,
            BargainTermsInfo::TENANTS_TYPE_FAMILY,
            BargainTermsInfo::TENANTS_TYPE_FEMALE,
            BargainTermsInfo::TENANTS_TYPE_MALE
        ], BargainTermsInfo::TENANTS_TYPE);
    }

    public function testPaymentPeriod()
    {
        $this->assertEquals([
            BargainTermsInfo::PAYMENT_PERIOD_ANNUAL,
            BargainTermsInfo::PAYMENT_PERIOD_MONTHLY
        ], BargainTermsInfo::PAYMENT_PERIOD);
    }

    public function testLeaseType()
    {
        $this->assertEquals([
            BargainTermsInfo::LEASE_TYPE_DIRECT,
            BargainTermsInfo::LEASE_TYPE_SUBLEASE
        ], BargainTermsInfo::LEASE_TYPE);
    }

    public function testVatType()
    {
        $this->assertEquals([
            BargainTermsInfo::VAT_TYPE_INCLUDED,
            BargainTermsInfo::VAT_TYPE_NOT_INCLUDED,
            BargainTermsInfo::VAT_TYPE_USN,
            BargainTermsInfo::VAT_TYPE_VAT_INCLUDED,
            BargainTermsInfo::VAT_TYPE_VAT_NOT_INCLUDED
        ], BargainTermsInfo::VAT_TYPE);
    }

    public function testSaleType()
    {
        $this->assertEquals([
            BargainTermsInfo::SALE_TYPE_ALTERNATIVE,
            BargainTermsInfo::SALE_TYPE_FREE
        ], BargainTermsInfo::SALE_TYPE);
    }

    public function testContractType()
    {
        $this->assertEquals([
            BargainTermsInfo::CONTRACT_TYPE_LEASE_ASSIGNMENT,
            BargainTermsInfo::CONTRACT_TYPE_LEASE_SALE
        ], BargainTermsInfo::CONTRACT_TYPE);
    }

    /**
     * @dataProvider depositProvider
     * @param $category
     * @param $deposit
     * @param $violation
     */
    public function testValidateDeposit($category, $deposit, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDeposit($deposit, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider priceTypeProvider
     * @param $category
     * @param $priceType
     * @param $violation
     */
    public function testValidatePriceType($category, $priceType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePriceType($priceType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider utilitiesTermsProvider
     * @param $category
     * @param $utilitiesTerms
     * @param $violation
     *
     */
    public function testValidateUtilitiesTerms($category, $utilitiesTerms, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateUtilitiesTerms($utilitiesTerms, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider bargainAllowedProvider
     * @param $category
     * @param $bargainAllowed
     * @param $violation
     *
     */
    public function testValidateBargainAllowed($category, $bargainAllowed, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBargainAllowed($bargainAllowed, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider bargainPriceProvider
     * @param $category
     * @param $bargainPrice
     * @param $violation
     *
     */
    public function testValidateBargainPrice($category, $bargainPrice, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBargainPrice($bargainPrice, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider bargainConditionsProvider
     * @param $category
     * @param $bargainConditions
     * @param $violation
     *
     */
    public function testValidateBargainConditions($category, $bargainConditions, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBargainConditions($bargainConditions, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider leaseTermTypeProvider
     * @param $category
     * @param $leaseTermType
     * @param $violation
     *
     */
    public function testValidateLeaseTermType($category, $leaseTermType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseTermType($leaseTermType, $this->getContext($ad, $violation),null);
    }

    //Дописать тест
//    /**
//     * @dataProvider prepayMonthsProvider
//     * @param $category
//     * @param $prepayMonths
//     * @param $violation
//     *
//     */
//    public function testValidatePrepayMonths($category, $prepayMonths, $violation)
//    {
//       $ad = new $this->commercial;
//
//        /** @noinspection PhpUndefinedMethodInspection */
//        $ad->setCategory($category);
//
//        /** @noinspection PhpUndefinedMethodInspection */
//        $this->class::validatePrepayMonths($prepayMonths, $this->getContext($ad, $violation),null);
//    }

    /**
     * @dataProvider tenantsTypeProvider
     * @param $category
     * @param $tenantsType
     * @param $violation
     *
     */
    public function testValidateTenantsType($category, $tenantsType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateTenantsType($tenantsType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider clientFeeProvider
     * @param $category
     * @param $clientFee
     * @param $violation
     *
     */
    public function testValidateClientFee($category, $clientFee, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateClientFee($clientFee, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider agentFeeProvider
     * @param $category
     * @param $agentFee
     * @param $violation
     *
     */
    public function testValidateAgentFee($category, $agentFee, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateAgentFee($agentFee, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider paymentPeriodProvider
     * @param $category
     * @param $paymentPeriod
     * @param $violation
     *
     */
    public function testValidatePaymentPeriod($category, $paymentPeriod, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePaymentPeriod($paymentPeriod, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider leaseTypeProvider
     * @param $category
     * @param $leaseType
     * @param $violation
     *
     */
    public function testValidateLeaseType($category, $leaseType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseType($leaseType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider includedOptionsProvider
     * @param $category
     * @param $includedOptions
     * @param $violation
     *
     */
    public function testValidateIncludedOptions($category, $includedOptions, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateIncludedOptions($includedOptions, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider minLeaseTermProvider
     * @param $category
     * @param $minLeaseTerm
     * @param $violation
     *
     */
    public function testValidateMinLeaseTerm($category, $minLeaseTerm, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateMinLeaseTerm($minLeaseTerm, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider securityDepositProvider
     * @param $category
     * @param $securityDeposit
     * @param $violation
     *
     */
    public function testValidateSecurityDeposit($category, $securityDeposit, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateSecurityDeposit($securityDeposit, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider vatTypeProvider
     * @param $category
     * @param $vatType
     * @param $violation
     *
     */
    public function testValidateVatType($category, $vatType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateVatType($vatType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider bargainVatPriceProvider
     * @param $category
     * @param $bargainVatPrice
     * @param $violation
     *
     */
    public function testValidateBargainVatPrice($category, $bargainVatPrice, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBargainVatPrice($bargainVatPrice, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasGracePeriodProvider
     * @param $category
     * @param $hasGracePeriod
     * @param $violation
     *
     */
    public function testValidateHasGracePeriod($category, $hasGracePeriod, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasGracePeriod($hasGracePeriod, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider mortgageAllowedProvider
     * @param $category
     * @param $mortgageAllowed
     * @param $violation
     *
     */
    public function testValidateMortgageAllowed($category, $mortgageAllowed, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateMortgageAllowed($mortgageAllowed, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider saleTypeProvider
     * @param $category
     * @param $saleType
     * @param $violation
     *
     */
    public function testValidateSaleType($category, $saleType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateSaleType($saleType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider actionIdProvider
     * @param $category
     * @param $actionId
     * @param $violation
     *
     */
    public function testValidateActionId($category, $actionId, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateActionId($actionId, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider contractTypeProvider
     * @param $category
     * @param $contractType
     * @param $violation
     *
     */
    public function testValidateContractType($category, $contractType, $violation)
    {
       $ad = new $this->commercial;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateContractType($contractType, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new BargainTermsInfo;

        $this->commercial = new class extends CommercialObject {

        };
    }

    /**
     * @return array
     */
    public function depositProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 123, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 123, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 123, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 123, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 123, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 123, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 123, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 123, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 123, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 123, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 123, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 123, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 123, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 123, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 123, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 123, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 123, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 123, true],
        ];
    }

    /**
     * @return array
     */
    public function priceTypeProvider(): array
    {
        $bargain = BargainTermsInfo::PRICE_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
    public function utilitiesTermsProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, array(1=>1), false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, array(1=>1), false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, array(1=>1), false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, array(1=>1), false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, array(1=>1), false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, array(1=>1), false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, array(1=>1), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, array(1=>1), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, array(1=>1), true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, array(1=>1), true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, array(1=>1), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, array(1=>1), true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, array(1=>1), true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, array(1=>1), true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, array(1=>1), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, array(1=>1), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, array(1=>1), true],
        ];
    }

    /**
     * @return array
     */
    public function bargainAllowedProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function bargainPriceProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 3.2, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 3.2, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 3.2, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 3.2, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 3.2, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 3.2, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 3.2, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 3.2, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 3.2, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 3.2, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 3.2, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 3.2, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 3.2, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 3.2, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 3.2, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 3.2, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 3.2, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function bargainConditionsProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 'Торг при осмотре.', false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 'Торг при осмотре.', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 'Торг при осмотре.', true],
        ];
    }

    /**
     * @return array
     */
    public function leaseTermTypeProvider(): array
    {
        $bargain = BargainTermsInfo::LEASE_TERM_TYPE;
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
//    public function prepayMonthsProvider(): array
//    {
//        return [
//            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
//            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 3, false],
//            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 14, true],
//
//            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
//            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 3, true],
//            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 14, true],
//            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
//            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, false],
//
//            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
//            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, false],
//
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, false],
//
//            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, false],
//
//            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, false],
//
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],
//
//            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
//            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],
//
//            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
//            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],
//
//            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
//            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],
//
//            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
//            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
//
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],
//
//            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],
//
//            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],
//
//            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],
//
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
//            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],
//
//            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
//            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],
//        ];
//    }

    /**
     * @return array
     */
    public function tenantsTypeProvider(): array
    {
        $bargain = BargainTermsInfo::TENANTS_TYPE;
        return [
            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
    public function clientFeeProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 42, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 42, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 42, true],
        ];
    }

    /**
     * @return array
     */
    public function agentFeeProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 42, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 42, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 42, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 42, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 42, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 42, true],
        ];
    }

    /**
     * @return array
     */
    public function paymentPeriodProvider(): array
    {
        $bargain = BargainTermsInfo::PAYMENT_PERIOD;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
    public function leaseTypeProvider(): array
    {
        $bargain = BargainTermsInfo::LEASE_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
    public function includedOptionsProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, array(1=>2), false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, array(1=>2), true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, array(1=>2), true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, array(1=>2), true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, array(1=>2), true],
        ];
    }

    /**
     * @return array
     */
    public function minLeaseTermProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function securityDepositProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 4, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 4, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function vatTypeProvider(): array
    {
        $bargain = BargainTermsInfo::VAT_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
        ];
    }

    /**
     * @return array
     */
    public function bargainVatPriceProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 3.2, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 3.2, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 3.2, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 3.2, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 3.2, true],
        ];
    }

    /**
     * @return array
     */
    public function hasGracePeriodProvider(): array
    {
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function mortgageAllowedProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, true, true],


            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, true, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, false, true],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function saleTypeProvider(): array
    {
        $bargain = BargainTermsInfo::SALE_TYPE;
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, false],


            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, false],
        ];
    }

    /**
     * @return array
     */
    public function actionIdProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 'A-19029', false],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, 'A-19029', true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 'A-19029', true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 'A-19029', true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 'A-19029', true],
        ];
    }

    /**
     * @return array
     */
    public function contractTypeProvider(): array
    {
        $bargain = BargainTermsInfo::CONTRACT_TYPE;
        return [
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE, $bargain, false],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE, $bargain, false],


            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT, $bargain, true],

            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, null, false],
            [CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, $bargain, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, $bargain, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, $bargain, true],
        ];
    }
}