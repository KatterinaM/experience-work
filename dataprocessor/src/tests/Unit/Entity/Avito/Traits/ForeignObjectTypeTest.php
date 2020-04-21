<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\ForeignObjectType;
use PHPUnit\Framework\TestCase;

/**
 * Class ForeignObjectTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class ForeignObjectTypeTest extends TestCase
{
    private $class;

    public function testGetAvailableObjectTypes()
    {
        /** @var ForeignObjectType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_APPARTMENT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_HOUSE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_LAND_PLOT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_GARAGE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_COMMERCIAL,
        ], $ad->getAvailableObjectTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use ForeignObjectType;
        };
    }
}
