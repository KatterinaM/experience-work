<?php

namespace App\Tests\Unit\Entity\Cian\Base;

use App\Entity\Cian\Base\CityObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\CityCategoryType;
use App\Entity\Cian\Traits\ConditionsCityRealty;
use App\Entity\Cian\Traits\JCSchema;
use App\Entity\Cian\Traits\Room;
use App\Entity\Cian\Traits\ShareAmount;
use App\Entity\Cian\Traits\TermsLease;
use App\Entity\Cian\Traits\TotalArea;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class AbstractCityObjectTest
 * @package App\Tests\Unit\Entity\Cian\Base
 */
class CityObjectTest extends ValidationTestCase
{
    private $class;

    public function testTraits()
    {
        $this->assertEquals([
            CityCategoryType::class,
            ShareAmount::class,
            JCSchema::class,
            AllInfrastructure::class,
            Room::class,
            ConditionsCityRealty::class,
            TotalArea::class,
            TermsLease::class,
            BargainTerms::class,
            Building::class,
        ], array_values(class_uses(CityObject::class)));
    }

    public function testDecoration(): void
    {
        $this->assertEquals([
            CityObject::DECORATION_FINE,
            CityObject::DECORATION_ROUGH,
            CityObject::DECORATION_WITHOUT
        ], CityObject::DECORATION);
    }

    /**
     *
     * @dataProvider decorationProvider
     * @param $category
     * @param $decoration
     * @param $violation
     */
    public function testValidateDecoration($category, $decoration, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDecoration($decoration, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider projectDeclarationUrlProvider
     * @param $category
     * @param $projectDeclarationUrl
     * @param $violation
     */
    public function testValidateProjectDeclarationUrl($category, $projectDeclarationUrl, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateProjectDeclarationUrl($projectDeclarationUrl, $this->getContext($ad, $violation),null);
    }

    /**
     *
     * @dataProvider cplModerationProvider
     * @param $category
     * @param $cplModeration
     * @param $violation
     */
    public function testValidateCplModeration($category, $cplModeration, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setCategory($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateCplModeration($cplModeration, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new class extends CityObject {

        };
    }

    /**
     * @return array
     */
    public function decorationProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, CityObject::DECORATION, false],
            
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, CityObject::DECORATION, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, CityObject::DECORATION, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, CityObject::DECORATION, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, CityObject::DECORATION, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, CityObject::DECORATION, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, CityObject::DECORATION, true],
        ];
    }

    /**
     * @return array
     */
    public function projectDeclarationUrlProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, true],
        ];
    }

    /**
     * @return array
     */
    public function cplModerationProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, array(1=>2), false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, array(1=>2), false],
        ];
    }
}