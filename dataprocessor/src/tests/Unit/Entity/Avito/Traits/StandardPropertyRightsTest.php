<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class StandardPropertyRightsTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class StandardPropertyRightsTest extends TestCase
{
    private $class;

    public function testGetAvailablePropertyRights()
    {
        /** @var StandardPropertyRights $ad */
        $ad = new $this->class;

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
        ], $ad->getAvailablePropertyRights());
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use StandardPropertyRights;
        };
    }
}
