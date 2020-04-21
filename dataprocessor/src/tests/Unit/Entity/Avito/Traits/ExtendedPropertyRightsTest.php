<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Traits\ExtendedPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class ExtendedPropertyRightsTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class ExtendedPropertyRightsTest extends TestCase
{
    private $class;

    public function testGetAvailablePropertyRights()
    {
        /** @var ExtendedPropertyRights $ad */
        $ad = new $this->class;

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
            PropertyRightsInterface::PROPERTY_RIGHTS_DEVELOPER,
        ], $ad->getAvailablePropertyRights());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use ExtendedPropertyRights;
        };
    }
}
