<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Traits\BaseOperationType;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class BaseOperationTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class BaseOperationTypeTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider priceTypeProvider
     * @param $category
     * @param $operationType
     * @param $priceType
     * @param $violation
     */
    public function testValidatePriceType($category, $operationType, $priceType, $violation): void
    {
        $ad = new $this->class($category, $operationType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePriceType($priceType, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null, $operationType = null) extends AbstractAd
        {
            use BaseOperationType;

            private $category;
            private $operationType;

            public function __construct(?string $category, ?string $operationType)
            {
                $this->category = $category;
                $this->operationType = $operationType;
            }

            public function getCategory(): string
            {
                return $this->category;
            }

            public function getOperationType(): string
            {
                return $this->operationType;
            }
        };
    }

    /**
     * @return array
     */
    public function priceTypeProvider(): array
    {
        $data = [
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                null,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                null,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_SELL_FOR_ALL,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_SELL_PER_M2,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH_PER_M2,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_SELL,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR_PER_M2,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_SELL_FOR_ALL,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_SELL_PER_M2,
                true
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH_PER_M2,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR,
                false
            ],
            [
                AbstractAd::CATEGORY_COMMERCIAL,
                OperationTypeInterface::OPERATION_TYPE_LEASE,
                OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR_PER_M2,
                false
            ],
        ];

        $invalidCategories = [
            AbstractAd::CATEGORY_APARTMENTS,
            AbstractAd::CATEGORY_ROOMS,
            AbstractAd::CATEGORY_COTTAGES,
            AbstractAd::CATEGORY_LAND_PLOTS,
            AbstractAd::CATEGORY_GARAGES,
            AbstractAd::CATEGORY_FOREIGN,
        ];

        foreach ($invalidCategories as $category) {
            $data = array_merge($data, [
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    null,
                    false
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    null,
                    false
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_SELL_FOR_ALL,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_SELL_PER_M2,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH_PER_M2,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_SELL,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR_PER_M2,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_SELL_FOR_ALL,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_SELL_PER_M2,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH_PER_M2,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR,
                    true
                ],
                [
                    $category,
                    OperationTypeInterface::OPERATION_TYPE_LEASE,
                    OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR_PER_M2,
                    true
                ],
            ]);
        }

        return $data;
    }
}
