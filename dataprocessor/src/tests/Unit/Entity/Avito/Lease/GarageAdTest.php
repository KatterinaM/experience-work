<?php

namespace App\Tests\Unit\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Lease\GarageAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class GarageAdTest
 * @package App\Tests\Unit\Entity\Avito\Lease
 */
class GarageAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LeaseOperationType::class,
        ], array_values(class_uses(GarageAd::class)));
    }

    public function testCommonFields()
    {
        $ad = new GarageAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_GARAGES,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_LEASE,
            $ad->getOperationType()
        );
    }
}
