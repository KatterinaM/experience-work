<?php

namespace App\Tests\Unit\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Lease\RoomsAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class RoomsAdTest
 * @package App\Tests\Unit\Entity\Avito\Lease
 */
class RoomsAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LeaseOperationType::class,
        ], array_values(class_uses(RoomsAd::class)));
    }

    public function testCommonFields()
    {
        $ad = new RoomsAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_ROOMS,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_LEASE,
            $ad->getOperationType()
        );
    }
}
