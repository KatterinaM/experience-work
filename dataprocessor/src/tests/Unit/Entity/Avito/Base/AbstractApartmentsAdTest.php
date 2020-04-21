<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractApartmentsAd;
use App\Entity\Avito\Base\MarketTypeInterface;
use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\HouseType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\MarketType;
use App\Entity\Avito\Traits\Rooms;
use App\Entity\Avito\Traits\Square;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class AbstractApartmentsAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractApartmentsAdTest extends ValidationTestCase
{
    private $class;

    public function testTraits()
    {
        $this->assertEquals([
            Location::class,
            Rooms::class,
            Square::class,
            Floors::class,
            HouseType::class,
            MarketType::class,
        ], array_values(class_uses(AbstractApartmentsAd::class)));
    }

    public function testDecorationTypes()
    {
        $this->assertEquals([
            'Без отделки',
            'Черновая',
            'Чистовая',
        ], AbstractApartmentsAd::DECORATION_TYPES);
    }

    /**
     * @dataProvider cadastralNumberProvider
     * @param $cadastralNumber
     * @param $violation
     */
    public function testValidateCadastralNumber($cadastralNumber, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCadastralNumber(
            $cadastralNumber,
            $this->getContext($ad, $violation, false),
            null
        );
    }

    /**
     * @dataProvider decorationNumberProvider
     * @param $marketType
     * @param $decoration
     * @param $violation
     */
    public function testValidateDecoration($marketType, $decoration, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setMarketType($marketType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDecoration($decoration, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class extends AbstractApartmentsAd {
            // Empty child class
        };
    }

    /**
     * @return array
     */
    public function cadastralNumberProvider(): array
    {
        return [
            ['47:14:1203001:814', false],
            ['47:14:120300:814', false],
            ['7:14:1203001:814', true],
            ['47:4:1203001:814', true],
            ['47:14:12030010:814', true],
            ['47:14:12030:814', true],
            ['47:14:12030:', true],
            ['471412030814', true],
            ['', true],
            [null, true],
        ];
    }

    /**
     * @return array
     */
    public function decorationNumberProvider(): array
    {
        return [
            [MarketTypeInterface::MARKET_TYPE_NEW, null, false],
            [MarketTypeInterface::MARKET_TYPE_NEW, AbstractApartmentsAd::DECORATION_TYPE_NONE, false],
            [MarketTypeInterface::MARKET_TYPE_NEW, AbstractApartmentsAd::DECORATION_TYPE_ROUGH, false],
            [MarketTypeInterface::MARKET_TYPE_NEW, AbstractApartmentsAd::DECORATION_TYPE_FINE, false],

            [MarketTypeInterface::MARKET_TYPE_OLD, null, false],
            [MarketTypeInterface::MARKET_TYPE_OLD, AbstractApartmentsAd::DECORATION_TYPE_NONE, true],
            [MarketTypeInterface::MARKET_TYPE_OLD, AbstractApartmentsAd::DECORATION_TYPE_ROUGH, true],
            [MarketTypeInterface::MARKET_TYPE_OLD, AbstractApartmentsAd::DECORATION_TYPE_FINE, true],
        ];
    }
}
