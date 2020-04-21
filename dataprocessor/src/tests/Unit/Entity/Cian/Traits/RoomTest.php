<?php

namespace App\Tests\Unit\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\RoomInterface;
use App\Entity\Cian\Traits\Room;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class RoomTest
 * @package App\Tests\Unit\Entity\Cian\Traits
 */
class RoomTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider roomTypeProvider
     * @param $category
     * @param $roomType
     * @param $violation
     */
    public function testValidateRoomType($category, $roomType, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateRoomType($roomType, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider roomsForSaleCountProvider
     * @param $category
     * @param $roomsForSaleCount
     * @param $violation
     */
    public function testValidateRoomsForSaleCount($category, $roomsForSaleCount, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateRoomsForSaleCount($roomsForSaleCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider roomAreaProvider
     * @param $category
     * @param $roomArea
     * @param $violation
     */
    public function testValidateRoomArea($category, $roomArea, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateRoomArea($roomArea, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider flatRoomsCountProvider
     * @param $category
     * @param $flatRoomsCount
     * @param $violation
     */
    public function testValidateFlatRoomsCount($category, $flatRoomsCount, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateFlatRoomsCount($flatRoomsCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider isApartmentsProvider
     * @param $category
     * @param $isApartments
     * @param $violation
     */
    public function testValidateIsApartments($category, $isApartments, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateIsApartments($isApartments, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider isPenthouseProvider
     * @param $category
     * @param $isPenthouse
     * @param $violation
     */
    public function testValidateIsPenthouse($category, $isPenthouse, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateIsPenthouse($isPenthouse, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider bedsCountProvider
     * @param $category
     * @param $bedsCount
     * @param $violation
     */
    public function testValidateBedsCount($category, $bedsCount, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateBedsCount($bedsCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider roomsCountProvider
     * @param $category
     * @param $roomsCount
     * @param $violation
     */
    public function testValidateRoomsCount($category, $roomsCount, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateRoomsCount($roomsCount, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider allRoomsAreaProvider
     * @param $category
     * @param $allRoomsArea
     * @param $violation
     */
    public function testValidateAllRoomsArea($category, $allRoomsArea, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateAllRoomsArea($allRoomsArea, $this->getContext($ad, $violation),null);
    }

    /**
     * @dataProvider roomDefinitionsProvider
     * @param $category
     * @param $roomDefinitions
     * @param $violation
     */
    public function testValidateRoomDefinitions($category, $roomDefinitions, $violation)
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateRoomDefinitions($roomDefinitions, $this->getContext($ad, $violation),null);
    }

    protected function setUp(): void
    {
        $this->class = new class($category = null) extends AbstractObject {
            use Room;

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
    public function roomTypeProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, RoomInterface::ROOM_TYPE, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, RoomInterface::ROOM_TYPE, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, RoomInterface::ROOM_TYPE, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, RoomInterface::ROOM_TYPE, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, RoomInterface::ROOM_TYPE, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, RoomInterface::ROOM_TYPE, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, RoomInterface::ROOM_TYPE, true],
        ];
    }

    /**
     * @return array
     */
    public function roomsForSaleCountProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function roomAreaProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, false],
        ];
    }

    /**
     * @return array
     */
    public function flatRoomsCountProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function isApartmentsProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, false],



            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],
        ];
    }

    /**
     * @return array
     */
    public function isPenthouseProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, true, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, false, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, true, false],



            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, true, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, false, true],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, true, true],
        ];
    }

    /**
     * @return array
     */
    public function bedsCountProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function roomsCountProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, true],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function allRoomsAreaProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, false],


            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],
        ];
    }

    /**
     * @return array
     */
    public function roomDefinitionsProvider(): array
    {
        return [
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_RENT, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE, 4, false],

            [CategoryInterface::CITY_CATEGORY_BED_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_BED_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_RENT, 4, true],

            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, null, false],
            [CategoryInterface::CITY_CATEGORY_ROOM_SALE, 4, true],
        ];
    }
}