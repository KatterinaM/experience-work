<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Traits\LandArea;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class LandAreaTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class LandAreaTest extends ValidationTestCase
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
        $this->class::validateLandArea(null, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null) extends AbstractAd {
            use LandArea;

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
            [AbstractAd::CATEGORY_APARTMENTS, false],
            [AbstractAd::CATEGORY_ROOMS, false],
            [AbstractAd::CATEGORY_COTTAGES, true],
            [AbstractAd::CATEGORY_LAND_PLOTS, true],
            [AbstractAd::CATEGORY_GARAGES, false],
            [AbstractAd::CATEGORY_COMMERCIAL, false],
            [AbstractAd::CATEGORY_FOREIGN, false],
        ];
    }
}
