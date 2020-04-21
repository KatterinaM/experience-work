<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractRoomsAd;
use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\HouseType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Rooms;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractRoomsAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractRoomsAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            StandardPropertyRights::class,
            Location::class,
            Rooms::class,
            Square::class,
            Floors::class,
            HouseType::class,
        ], array_values(class_uses(AbstractRoomsAd::class)));
    }
}
