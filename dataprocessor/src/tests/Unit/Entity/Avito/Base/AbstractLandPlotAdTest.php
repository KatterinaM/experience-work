<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractLandPlotAd;
use App\Entity\Avito\Traits\LandArea;
use App\Entity\Avito\Traits\LandPlotObjectType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractLandPlotAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractLandPlotAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            LandPlotObjectType::class,
            StandardPropertyRights::class,
            Location::class,
            LandArea::class,
        ], array_values(class_uses(AbstractLandPlotAd::class)));
    }
}
