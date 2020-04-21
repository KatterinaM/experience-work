<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractCommercialAd;
use App\Entity\Avito\Base\ObjectTypeInterface;
use App\Entity\Avito\Traits\CommercialObjectType;
use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class AbstractCommercialAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractCommercialAdTest extends ValidationTestCase
{
    private $class;

    public function testTraits()
    {
        $this->assertEquals([
            Location::class,
            CommercialObjectType::class,
            StandardPropertyRights::class,
            Square::class,
            Floors::class,
        ], array_values(class_uses(AbstractCommercialAd::class)));
    }

    /**
     * @dataProvider buildingClassProvider
     * @param $objectType
     * @param $buildingClass
     * @param $violation
     */
    public function testValidateDecoration($objectType, $buildingClass, $violation)
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setObjectType($objectType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBuildingClass($buildingClass, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class extends AbstractCommercialAd
        {
            // Empty child class
        };
    }

    /**
     * @return array
     */
    public static function buildingClassProvider(): array
    {
        return [
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL, AbstractCommercialAd::BUILDING_CLASS_A, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL, AbstractCommercialAd::BUILDING_CLASS_B, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL, AbstractCommercialAd::BUILDING_CLASS_C, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL, AbstractCommercialAd::BUILDING_CLASS_D, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL, null, false],

            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE, AbstractCommercialAd::BUILDING_CLASS_A, false],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE, AbstractCommercialAd::BUILDING_CLASS_B, false],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE, AbstractCommercialAd::BUILDING_CLASS_C, false],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE, AbstractCommercialAd::BUILDING_CLASS_D, false],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE, null, false],

            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM, AbstractCommercialAd::BUILDING_CLASS_A, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM, AbstractCommercialAd::BUILDING_CLASS_B, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM, AbstractCommercialAd::BUILDING_CLASS_C, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM, AbstractCommercialAd::BUILDING_CLASS_D, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM, null, false],

            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM, AbstractCommercialAd::BUILDING_CLASS_A, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM, AbstractCommercialAd::BUILDING_CLASS_B, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM, AbstractCommercialAd::BUILDING_CLASS_C, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM, AbstractCommercialAd::BUILDING_CLASS_D, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM, null, false],

            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
                AbstractCommercialAd::BUILDING_CLASS_A,
                true
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
                AbstractCommercialAd::BUILDING_CLASS_B,
                true
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
                AbstractCommercialAd::BUILDING_CLASS_C,
                true
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
                AbstractCommercialAd::BUILDING_CLASS_D,
                true
            ],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM, null, false],

            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
                AbstractCommercialAd::BUILDING_CLASS_A,
                false
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
                AbstractCommercialAd::BUILDING_CLASS_B,
                false
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
                AbstractCommercialAd::BUILDING_CLASS_C,
                false
            ],
            [
                ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
                AbstractCommercialAd::BUILDING_CLASS_D,
                false
            ],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE, null, false],

            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM, AbstractCommercialAd::BUILDING_CLASS_A, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM, AbstractCommercialAd::BUILDING_CLASS_B, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM, AbstractCommercialAd::BUILDING_CLASS_C, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM, AbstractCommercialAd::BUILDING_CLASS_D, true],
            [ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM, null, false],
        ];
    }
}
