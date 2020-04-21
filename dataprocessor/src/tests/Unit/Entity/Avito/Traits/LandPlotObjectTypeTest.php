<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\LandPlotObjectType;
use PHPUnit\Framework\TestCase;

/**
 * Class LandPlotObjectTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class LandPlotObjectTypeTest extends TestCase
{
    private $class;

    public function testGetAvailableObjectTypes()
    {
        /** @var LandPlotObjectType $ad */
        $ad = new $this->class;

        $this->assertEquals([
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_INDIVIDUAL,
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_AGRICULTURAL,
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_INDUSTRIAL,
        ], $ad->getAvailableObjectTypes());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use LandPlotObjectType;
        };
    }
}
