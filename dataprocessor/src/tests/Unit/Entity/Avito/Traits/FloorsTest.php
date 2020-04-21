<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Traits\Floors;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class FloorsTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class FloorsTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider floorProvider
     * @param $floor
     * @param $violation
     */
    public function testValidateFloorNumber($floor, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setFloors(10);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateFloor($floor, $this->getContext($ad, $violation), null);
    }
    
    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use Floors;
        };
    }

    /**
     * @return array
     */
    public function floorProvider(): array
    {
        return [
            [3, false],
            [13, true],
        ];
    }
}
