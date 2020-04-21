<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\MarketTypeInterface;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\MarketType;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class LocationTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class LocationTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider countryProvider
     * @param $category
     * @param $country
     * @param $violation
     */
    public function testValidateCountry($category, $country, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCountry($country, $this->getContext($ad, $violation), null);
    }

    /**
     * @dataProvider addressProvider
     * @param $category
     * @param $marketType
     * @param $address
     * @param $violation
     */
    public function testValidateAddress($category, $marketType, $address, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setMarketType($marketType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateAddress($address, $this->getContext($ad, $violation), null);
    }

    /**
     * @dataProvider newDevelopmentIdProvider
     * @param $category
     * @param $marketType
     * @param $newDevelopmentId
     * @param $violation
     */
    public function testValidateNewDevelopmentId($category, $marketType, $newDevelopmentId, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setMarketType($marketType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateNewDevelopmentId($newDevelopmentId, $this->getContext($ad, $violation), null);
    }

    /**
     * @dataProvider distanceToCityProvider
     * @param $category
     * @param $distanceToCity
     * @param $violation
     */
    public function testValidateDistanceToCity($category, $distanceToCity, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDistanceToCity($distanceToCity, $this->getContext($ad, $violation), null);
    }

    /**
     * @dataProvider coordinatesProvider
     * @param $category
     * @param $marketType
     * @param $value
     * @param $violation
     */
    public function testValidateCoordinates($category, $marketType, $value, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setMarketType($marketType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCoordinates($value, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null) extends AbstractAd {
            use Location;
            use MarketType;

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
    public function countryProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, 'какая-то страна', true],


            [AbstractAd::CATEGORY_ROOMS, null, false],
            [AbstractAd::CATEGORY_ROOMS, 'какая-то страна', true],

            [AbstractAd::CATEGORY_COTTAGES, null, false],
            [AbstractAd::CATEGORY_COTTAGES, 'какая-то страна', true],

            [AbstractAd::CATEGORY_LAND_PLOTS, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, 'какая-то страна', true],

            [AbstractAd::CATEGORY_GARAGES, null, false],
            [AbstractAd::CATEGORY_GARAGES, 'какая-то страна', true],

            [AbstractAd::CATEGORY_COMMERCIAL, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, 'какая-то страна', true],

            [AbstractAd::CATEGORY_FOREIGN, null, true],
            [AbstractAd::CATEGORY_FOREIGN, 'какая-то страна', false],
        ];
    }

    /**
     * @return array
     */
    public function addressProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],

            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, null, true],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', false],
        ];
    }

    /**
     * @return array
     */
    public function newDevelopmentIdProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, null, true],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', false],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],

            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, 'какой-то адрес', true],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, 'какой-то адрес', true],
        ];
    }

    /**
     * @return array
     */
    public function distanceToCityProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, 123, false],

            [AbstractAd::CATEGORY_ROOMS, null, false],
            [AbstractAd::CATEGORY_ROOMS, 123, false],

            [AbstractAd::CATEGORY_COTTAGES, null, true],
            [AbstractAd::CATEGORY_COTTAGES, 123, false],

            [AbstractAd::CATEGORY_LAND_PLOTS, null, true],
            [AbstractAd::CATEGORY_LAND_PLOTS, 123, false],

            [AbstractAd::CATEGORY_GARAGES, null, false],
            [AbstractAd::CATEGORY_GARAGES, 123, false],

            [AbstractAd::CATEGORY_COMMERCIAL, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, 123, false],

            [AbstractAd::CATEGORY_FOREIGN, null, false],
            [AbstractAd::CATEGORY_FOREIGN, 123, false],
        ];
    }

    /**
     * @return array
     */
    public function coordinatesProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, true],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_ROOMS, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_COTTAGES, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_GARAGES, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],

            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_NEW, 123.321, false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [AbstractAd::CATEGORY_FOREIGN, MarketTypeInterface::MARKET_TYPE_OLD, 123.321, false],
        ];
    }
}
