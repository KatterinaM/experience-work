<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\RoomInterface;
use App\Entity\Cian\RoomDefinitions;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Room
 * @package App\Entity\Avito\Traits
 */
trait Room
{
    /**
     * @var string
     * @Serializer\SerializedName("RoomType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\RoomInterface::ROOM_TYPE)
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateRoomType" })
     */
    private $roomType;

    /**
     * @var int
     * @Serializer\SerializedName("RoomsForSaleCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateRoomsForSaleCount" })
     */
    private $roomsForSaleCount;

    /**
     * @var double
     * @Serializer\SerializedName("RoomArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateRoomArea" })
     */
    private $roomArea;

    /**
     * @var int
     * @Serializer\SerializedName("FlatRoomsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateFlatRoomsCount" })
     */
    private $flatRoomsCount;

    /**
     * @var bool
     * @Serializer\SerializedName("IsApartments")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateIsApartments" })
     * @Constraints\Type("bool")
     */
    private $isApartments;

    /**
     * @var bool
     * @Serializer\SerializedName("IsPenthouse")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateIsPenthouse" })
     * @Constraints\Type("bool")
     */
    private $isPenthouse;

    /**
     * @var int
     * @Serializer\SerializedName("BedsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateBedsCount" })
     */
    private $bedsCount;

    /**
     * @var int
     * @Serializer\SerializedName("RoomsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateRoomsCount" })
     */
    private $roomsCount;

    /**
     * @var string
     * @Serializer\SerializedName("AllRoomsArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateAllRoomsArea" })
     */
    private $allRoomsArea;

    /**
     * @var RoomDefinitions
     * @Serializer\SerializedName("RoomDefinitions")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Room", "validateRoomDefinitions" })
     * @Constraints\Type("App\Entity\Cian\RoomDefinitions")
     * @Constraints\Valid()
     */

    private $roomDefinitions;

    /**
     * @return string
     */
    public function getRoomType(): string
    {
        return $this->roomType;
    }

    /**
     * @param string $roomType
     */
    public function setRoomType(string $roomType): void
    {
        $this->roomType = $roomType;
    }

    /**
     * @return int
     */
    public function getRoomsForSaleCount(): int
    {
        return $this->roomsForSaleCount;
    }

    /**
     * @param int $roomsForSaleCount
     */
    public function setRoomsForSaleCount(int $roomsForSaleCount): void
    {
        $this->roomsForSaleCount = $roomsForSaleCount;
    }

    /**
     * @return float
     */
    public function getRoomArea(): float
    {
        return $this->roomArea;
    }

    /**
     * @param float $roomArea
     */
    public function setRoomArea(float $roomArea): void
    {
        $this->roomArea = $roomArea;
    }

    /**
     * @return int
     */
    public function getFlatRoomsCount(): int
    {
        return $this->flatRoomsCount;
    }

    /**
     * @param int $flatRoomsCount
     */
    public function setFlatRoomsCount(int $flatRoomsCount): void
    {
        $this->flatRoomsCount = $flatRoomsCount;
    }

    /**
     * @return bool
     */
    public function isApartments(): bool
    {
        return $this->isApartments;
    }

    /**
     * @param bool $isApartments
     */
    public function setIsApartments(bool $isApartments): void
    {
        $this->isApartments = $isApartments;
    }

    /**
     * @return bool
     */
    public function isPenthouse(): bool
    {
        return $this->isPenthouse;
    }

    /**
     * @param bool $isPenthouse
     */
    public function setIsPenthouse(bool $isPenthouse): void
    {
        $this->isPenthouse = $isPenthouse;
    }

    /**
     * @return int
     */
    public function getBedsCount(): int
    {
        return $this->bedsCount;
    }

    /**
     * @param int $bedsCount
     */
    public function setBedsCount(int $bedsCount): void
    {
        $this->bedsCount = $bedsCount;
    }

    /**
     * @return int
     */
    public function getRoomsCount(): int
    {
        return $this->roomsCount;
    }

    /**
     * @param int $roomsCount
     */
    public function setRoomsCount(int $roomsCount): void
    {
        $this->roomsCount = $roomsCount;
    }

    /**
     * @return string
     */
    public function getAllRoomsArea(): string
    {
        return $this->allRoomsArea;
    }

    /**
     * @param string $allRoomsArea
     */
    public function setAllRoomsArea(string $allRoomsArea): void
    {
        $this->allRoomsArea = $allRoomsArea;
    }

    /**
     * @return RoomDefinitions
     */
    public function getRoomDefinitions(): RoomDefinitions
    {
        return $this->roomDefinitions;
    }

    /**
     * @param RoomDefinitions $roomDefinitions
     */
    public function setRoomDefinitions(RoomDefinitions $roomDefinitions): void
    {
        $this->roomDefinitions = $roomDefinitions;
    }

    /**
     * @param $roomType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRoomType(
        $roomType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($roomType) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Доля в квартире"'
            )->addViolation();
        }
    }

    /**
     * @param $roomsForSaleCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRoomsForSaleCount(
        $roomsForSaleCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($roomsForSaleCount) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $roomArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRoomArea(
        $roomArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (is_null($roomArea) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $flatRoomsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFlatRoomsCount(
        $flatRoomsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($flatRoomsCount) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ])) || (!is_null($flatRoomsCount) && !in_array($object->getCategory(), [
                    CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                    CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                    CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                    CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                ]))) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Квартира", "Комната", "Доля в квартире", "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $isApartments
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsApartments(
        $isApartments,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((!is_null($isApartments) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT
                ]))) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $isPenthouse
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsPenthouse(
        $isPenthouse,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((!is_null($isPenthouse) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT
            ]))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $bedsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBedsCount(
        $bedsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bedsCount) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Койко-место"'
            )->addViolation();
        }
    }

    /**
     * @param $roomsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRoomsCount(
        $roomsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($roomsCount) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $roomsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateAllRoomsArea(
        $allRoomsArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($allRoomsArea) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $roomDefinitions
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRoomDefinitions(
        $roomDefinitions,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($roomDefinitions) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }
}