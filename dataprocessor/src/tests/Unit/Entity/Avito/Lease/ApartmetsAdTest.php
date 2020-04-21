<?php

namespace App\Tests\Unit\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Lease\ApartmetsAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class ApartmetsAdTest
 * @package App\Tests\Unit\Entity\Avito\Lease
 */
class ApartmetsAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LeaseOperationType::class,
            StandardPropertyRights::class,
        ], array_values(class_uses(ApartmetsAd::class)));
    }


    public function testCommonFields()
    {
        $ad = new ApartmetsAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_APARTMENTS,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_LEASE,
            $ad->getOperationType()
        );

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
        ], $ad->getAvailablePropertyRights());
    }
}
