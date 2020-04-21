<?php

namespace App\Tests\Unit\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Lease\LandPlotAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class LandPlotAdTest
 * @package App\Tests\Unit\Entity\Avito\Lease
 */
class LandPlotAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LeaseOperationType::class,
        ], array_values(class_uses(LandPlotAd::class)));
    }

    public function testCommonFields()
    {
        $ad = new LandPlotAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_LAND_PLOTS,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_LEASE,
            $ad->getOperationType()
        );
    }
}
