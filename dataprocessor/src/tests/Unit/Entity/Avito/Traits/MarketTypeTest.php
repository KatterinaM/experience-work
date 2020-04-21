<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\MarketTypeInterface;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Tests\Unit\Entity\ValidationTestCase;
use App\Entity\Avito\Traits\MarketType;

/**
 * Class MarketTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class MarketTypeTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider marketTypeProvider
     * @param $category
     * @param $operationType
     * @param $marketType
     * @param $violation
     */
    public function testValidateMarketType($category, $operationType, $marketType, $violation): void
    {
        $ad = new $this->class($operationType, $category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateMarketType($marketType, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($operationType = null, $category = null) extends AbstractAd
        {
            use MarketType;

            private $operationType;
            private $category;

            public function __construct(?string $operationType, ?string $category)
            {
                $this->operationType = $operationType;
                $this->category = $category;
            }

            public function getOperationType(): ?string
            {
                return $this->operationType;
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
    public function marketTypeProvider(): array
    {
        return [
            [
                AbstractAd::CATEGORY_APARTMENTS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_APARTMENTS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_APARTMENTS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_APARTMENTS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_APARTMENTS, OperationTypeInterface::OPERATION_TYPE_SELL, null, true],
            [AbstractAd::CATEGORY_APARTMENTS, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_APARTMENTS, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_APARTMENTS, null, null, false],

            [
                AbstractAd::CATEGORY_ROOMS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_ROOMS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_ROOMS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_ROOMS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_ROOMS, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_ROOMS, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_ROOMS, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_ROOMS, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_ROOMS, null, null, false],

            [
                AbstractAd::CATEGORY_COTTAGES,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_COTTAGES,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_COTTAGES,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_COTTAGES,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_COTTAGES, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_COTTAGES, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_COTTAGES, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_COTTAGES, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_COTTAGES, null, null, false],

            [
                AbstractAd::CATEGORY_LAND_PLOTS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_LAND_PLOTS,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_LAND_PLOTS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_LAND_PLOTS,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_LAND_PLOTS, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, null, null, false],

            [
                AbstractAd::CATEGORY_GARAGES,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_GARAGES,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_GARAGES,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_GARAGES,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_GARAGES, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_GARAGES, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_GARAGES, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_GARAGES, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_GARAGES, null, null, false],

            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_COMMERCIAL, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_COMMERCIAL, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_COMMERCIAL, null, null, false],

            [
                AbstractAd::CATEGORY_FOREIGN,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_FOREIGN,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [
                AbstractAd::CATEGORY_FOREIGN,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_NEW,
                false
            ],
            [
                AbstractAd::CATEGORY_FOREIGN,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                MarketTypeInterface::MARKET_TYPE_OLD,
                false
            ],
            [AbstractAd::CATEGORY_FOREIGN, OperationTypeInterface::OPERATION_TYPE_SELL, null, false],
            [AbstractAd::CATEGORY_FOREIGN, OperationTypeInterface::OPERATION_TYPE_LEASE, null, false],
            [AbstractAd::CATEGORY_FOREIGN, null, MarketTypeInterface::MARKET_TYPE_NEW, false],
            [AbstractAd::CATEGORY_FOREIGN, null, MarketTypeInterface::MARKET_TYPE_OLD, false],
            [AbstractAd::CATEGORY_FOREIGN, null, null, false],
        ];
    }
}
