<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractGarageAd;
use App\Entity\Avito\Traits\GarageObjectSubtype;
use App\Entity\Avito\Traits\GarageObjectType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Secured;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractGarageAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractGarageAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            GarageObjectType::class,
            GarageObjectSubtype::class,
            StandardPropertyRights::class,
            Location::class,
            Secured::class,
            Square::class
        ], array_values(class_uses(AbstractGarageAd::class)));
    }
}
