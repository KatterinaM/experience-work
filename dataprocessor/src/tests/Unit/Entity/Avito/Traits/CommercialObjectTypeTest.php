<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\CommercialObjectType;
use PHPUnit\Framework\TestCase;

/**
 * Class CommercialObjectTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class CommercialObjectTypeTest extends TestCase
{
    private $class;

    public function testGetAvailableObjectTypes()
    {
        /** @var CommercialObjectType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM,
        ], $ad->getAvailableObjectTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use CommercialObjectType;
        };
    }
}
