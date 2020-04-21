<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Flat;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class House
 * @package App\Entity\Cian
 */
class House
{
    /**
     * @var int
     * @Serializer\SerializedName("Id")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\House", "validateHouseId" })
     */
    private $houseId;

    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\House", "validateHouseName" })
     */
    private $houseName;

    /**
     * @var Flat
     * @Serializer\SerializedName("Flat")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\House", "validateFlat" })
     * @Constraints\Type("App\Entity\Cian\Flat")
     */
    private $flat;

    /**
     * @return int
     */
    public function getHouseId(): int
    {
        return $this->houseId;
    }

    /**
     * @param int $houseId
     */
    public function setHouseId(int $houseId): void
    {
        $this->houseId = $houseId;
    }

    /**
     * @return string
     */
    public function getHouseName(): string
    {
        return $this->houseName;
    }

    /**
     * @param string $houseName
     */
    public function setHouseName(string $houseName): void
    {
        $this->houseName = $houseName;
    }

    /**
     * @return \App\Entity\Cian\Flat
     */
    public function getFlat(): Flat
    {
        return $this->flat;
    }

    /**
     * @param \App\Entity\Cian\Flat $flat
     */
    public function setFlat(Flat $flat): void
    {
        $this->flat = $flat;
    }

    /**
     * @param $houseId
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHouseId(
        $houseId,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($houseId) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                ])) || !is_null($houseId) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Квартира", "Комната", "Готовый бизнес", "Офис", "Помещение свободного назначения", "Производство",
                 "Склад", "Торговая площадь", "Доля в квартире", "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $houseName
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHouseName(
        $houseName,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($houseName) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Квартира", "Комната", "Готовый бизнес", "Офис", "Помещение свободного назначения", "Производство",
                 "Склад", "Торговая площадь", "Доля в квартире", "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $flat
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFlat(
        $flat,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($flat) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Квартира", "Комната", "Готовый бизнес", "Офис", "Помещение свободного назначения", "Производство",
                 "Склад", "Торговая площадь", "Доля в квартире", "Квартира в новостройке"'
            )->addViolation();
        }
    }
}