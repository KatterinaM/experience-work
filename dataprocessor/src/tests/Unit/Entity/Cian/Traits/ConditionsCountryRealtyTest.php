<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\ConditionsCountryRealtyInterface;
use App\Entity\Cian\Traits\ConditionsCountryRealty;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class ConditionsCountryRealtyTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class ConditionsCountryRealtyTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider bedroomsCountProvider
     * @param $category
     * @param $bedroomsCount
     * @param $violation
     */
    public function testValidateBedroomsCount($category, $bedroomsCount, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBedroomsCount($bedroomsCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider wcLocationTypeProvider
     * @param $category
     * @param $wcLocationType
     * @param $violation
     */
    public function testValidateWcLocationType($category, $wcLocationType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateWcLocationType($wcLocationType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasBathhouseProvider
     * @param $category
     * @param $hasBathhouse
     * @param $violation
     */
    public function testValidateHasBathhouse($category, $hasBathhouse, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasBathhouse($hasBathhouse, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasGarageProvider
     * @param $category
     * @param $hasGarage
     * @param $violation
     */
    public function testValidateHasGarage($category, $hasGarage, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasGarage($hasGarage, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasPoolProvider
     * @param $category
     * @param $hasPool
     * @param $violation
     */
    public function testValidateHasPool($category, $hasPool, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasPool($hasPool, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasGasProvider
     * @param $category
     * @param $hasGas
     * @param $violation
     */
    public function testValidateHasGas($category, $hasGas, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasGas($hasGas, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasDrainageProvider
     * @param $category
     * @param $hasDrainage
     * @param $violation
     */
    public function testValidateHasDrainage($category, $hasDrainage, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasDrainage($hasDrainage, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider hasSecurityProvider
     * @param $category
     * @param $hasSecurity
     * @param $violation
     */
    public function testValidateHasSecurity($category, $hasSecurity, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateHasSecurity($hasSecurity, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider kpIdProvider
     * @param $category
     * @param $kpId
     * @param $violation
     */
    public function testValidateKpId($category, $kpId, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateKpId($kpId, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new class($category = null) extends AbstractObject {
            use ConditionsCountryRealty;

            private $category;

            public function __construct(?string $category)
            {
                $this->category = $category;
            }

            public function getCategory(): string
            {
                return $this->category;
            }
        };
    }

    /**
     * @return array
     */
    public function bedroomsCountProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 4, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function wcLocationTypeProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, ConditionsCountryRealtyInterface::WC_LOCATION_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function hasBathhouseProvider(): array
    {
        return [
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

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function hasGarageProvider(): array
    {
        return [
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

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function hasPoolProvider(): array
    {
        return [
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

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function hasGasProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, false],

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
        ];
    }

    /**
     * @return array
     */
    public function hasDrainageProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, false],

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
        ];
    }

    /**
     * @return array
     */
    public function hasSecurityProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, false],

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

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function kpIdProvider(): array
    {
        return [
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, 42, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, 42, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, 42, true],
        ];
    }

}