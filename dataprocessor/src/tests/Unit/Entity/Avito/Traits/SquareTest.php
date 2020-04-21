<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Traits\Square;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class SquareTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class SquareTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider categoryProvider
     * @param $category
     * @param $violation
     */
    public function testValidateFloorNumber($category, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateSquare(null, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null) extends AbstractAd {
            use Square;

            private $category;

            public function __construct(?string $category)
            {
                $this->category = $category;
            }

            public function getCategory(): string
            {
                return $this->category;
            }
        };
    }

    /**
     * @return array
     */
    public function categoryProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, true],
            [AbstractAd::CATEGORY_ROOMS, true],
            [AbstractAd::CATEGORY_COTTAGES, true],
            [AbstractAd::CATEGORY_LAND_PLOTS, false],
            [AbstractAd::CATEGORY_GARAGES, true],
            [AbstractAd::CATEGORY_COMMERCIAL, true],
            [AbstractAd::CATEGORY_FOREIGN, false],
        ];
    }
}
