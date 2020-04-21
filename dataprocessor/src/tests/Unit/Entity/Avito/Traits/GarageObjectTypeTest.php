<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\GarageObjectType;
use PHPUnit\Framework\TestCase;

/**
 * Class GarageObjectTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class GarageObjectTypeTest extends TestCase
{
    private $class;

    public function testGetAvailableObjectTypes()
    {
        /** @var GarageObjectType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            ObjectTypeInterface::OBJECT_TYPE_GARAGE_BUILDING,
            ObjectTypeInterface::OBJECT_TYPE_GARAGE_SPACE,
        ], $ad->getAvailableObjectTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use GarageObjectType;
        };
    }
}
