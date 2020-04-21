<?php

namespace App\Tests\Unit\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Lease\ForeignAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class ForeignAdTest
 * @package App\Tests\Unit\Entity\Avito\Lease
 */
class ForeignAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LeaseOperationType::class,
        ], array_values(class_uses(ForeignAd::class)));
    }

    public function testCommonFields()
    {
        $ad = new ForeignAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_FOREIGN,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_LEASE,
            $ad->getOperationType()
        );

        $this->assertEquals([
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_APPARTMENT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_HOUSE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_LAND_PLOT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_GARAGE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_COMMERCIAL,
        ], $ad->getAvailableObjectTypes());

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
        ], $ad->getAvailablePropertyRights());
    }
}
