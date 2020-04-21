<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Traits\BaseObjectSubtype;
use App\Entity\Avito\Traits\BaseObjectType;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class BaseObjectSubtypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class BaseObjectSubtypeTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider objectSubtypeProvider
     * @param $category
     * @param $subtype
     * @param $violation
     */
    public function testValidateObjectSubtype($category, $subtype, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateObjectSubtype($subtype, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null) extends AbstractAd {
            use BaseObjectType;
            use BaseObjectSubtype;

            private $category;

            public function __construct(?string $category)
            {
                $this->category = $category;
            }

            public function getCategory(): string
            {
                return $this->category;
            }

            public function getAvailableObjectTypes(): array
            {
                return [null];
            }

            public function getAvailableObjectSubtypes(): array
            {
                return [null, 'некий подтип'];
            }
        };
    }

    /**
     * @return array
     */
    public function objectSubtypeProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, null, false],
            [AbstractAd::CATEGORY_APARTMENTS, 'некий подтип', true],

            [AbstractAd::CATEGORY_ROOMS, null, false],
            [AbstractAd::CATEGORY_ROOMS, 'некий подтип', true],

            [AbstractAd::CATEGORY_COTTAGES, null, false],
            [AbstractAd::CATEGORY_COTTAGES, 'некий подтип', true],

            [AbstractAd::CATEGORY_LAND_PLOTS, null, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, 'некий подтип', true],

            [AbstractAd::CATEGORY_GARAGES, null, true],
            [AbstractAd::CATEGORY_GARAGES, 'некий подтип', false],

            [AbstractAd::CATEGORY_COMMERCIAL, null, false],
            [AbstractAd::CATEGORY_COMMERCIAL, 'некий подтип', true],

            [AbstractAd::CATEGORY_FOREIGN, null, false],
            [AbstractAd::CATEGORY_FOREIGN, 'некий подтип', true],
        ];
    }
}
