<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Traits\TermsLease;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class TermsLeaseTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class TermsLeaseTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider petsAllowedProvider
     * @param $category
     * @param $petsAllowed
     * @param $violation
     */
    public function testValidatePetsAllowed($category, $petsAllowed, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validatePetsAllowed($petsAllowed, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider childrenAllowedProvider
     * @param $category
     * @param $childrenAllowed
     * @param $violation
     */
    public function testValidateChildrenAllowed($category, $childrenAllowed, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateChildrenAllowed($childrenAllowed, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new class($category = null) extends AbstractObject {
            use TermsLease;

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
    public function petsAllowedProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function childrenAllowedProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT, true, false],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, false, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_LAND_SALE, true, true],

            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, null, false],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, false, true],
            [CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE, true, true],
        ];
    }
}