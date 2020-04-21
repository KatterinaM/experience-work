<?php

namespace App\Tests\Unit\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Location;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class LocationTest
 * @package App\Tests\Unit\Entity\Yandex\Realty
 */
class LocationTest extends ValidationTestCase
{
    /** @var Location */
    private $location;

    public function setUp(): void
    {
        $this->location = new Location;
    }

    public function testCountry()
    {
        $this->assertEquals(Location::COUNTRY_RUSSIA, $this->location->getCountry());
    }
}
