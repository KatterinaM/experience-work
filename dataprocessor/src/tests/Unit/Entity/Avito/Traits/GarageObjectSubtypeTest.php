<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectSubtypeInterface;
use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\GarageObjectSubtype;
use App\Entity\Avito\Traits\GarageObjectType;
use PHPUnit\Framework\TestCase;

/**
 * Class GarageObjectSubtypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class GarageObjectSubtypeTest extends TestCase
{
    private $class;

    public function testGetAvailableObjectSubtypes()
    {
        /** @var GarageObjectSubtype $ad */
        $ad = new $this->class;

        $this->assertEquals([], $ad->getAvailableObjectSubtypes('oops!'));

        $this->assertEquals([
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_CONCRETE,
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_BRICK,
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_METAL,
        ], $ad->getAvailableObjectSubtypes(ObjectTypeInterface::OBJECT_TYPE_GARAGE_BUILDING));

        $this->assertEquals([
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_MULTI_LEVEL,
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_UNDERGROUND,
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_CLOSED,
            ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_OPEN,
        ], $ad->getAvailableObjectSubtypes(ObjectTypeInterface::OBJECT_TYPE_GARAGE_SPACE));
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use GarageObjectType;
            use GarageObjectSubtype;
        };
    }
}
