<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class JCSchemaInfo
 * @package App\Entity\Cian
 */
class JCSchemaInfo
{
    /**
     * @var int
     * @Serializer\SerializedName("Id")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Cian\JCSchema", "validateJCSchemaId" })
     */
    private $jCSchemaId;

    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\JCSchema", "validateJCSchemaName" })
     */
    private $jCSchemaName;

    /**
     * @var House
     * @Serializer\SerializedName("House")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\Type("App\Entity\Cian\House")
     * @Constraints\Valid()
     */
    private $house;

    /**
     * @return int
     */
    public function getJCSchemaId(): int
    {
        return $this->jCSchemaId;
    }

    /**
     * @param int $jCSchemaId
     */
    public function setJCSchemaId(int $jCSchemaId): void
    {
        $this->jCSchemaId = $jCSchemaId;
    }

    /**
     * @return string
     */
    public function getJCSchemaName(): string
    {
        return $this->jCSchemaName;
    }

    /**
     * @param string $jCSchemaName
     */
    public function setJCSchemaName(string $jCSchemaName): void
    {
        $this->jCSchemaName = $jCSchemaName;
    }

    /**
     * @return House
     */
    public function getHouse(): House
    {
        return $this->house;
    }

    /**
     * @param House $house
     */
    public function setHouse(House $house): void
    {
        $this->house = $house;
    }

    /**
     * @param $jCSchemaId
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateJCSchemaId(
        $jCSchemaId,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($jCSchemaId) && in_array($object->getCategory(), [
                    CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                ])) || (!in_array( $object->getCategory(), array(
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
                ) ) && !is_null( $jCSchemaId ))) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Квартира", "Комната", "Готовый бизнес", "Офис", "Помещение свободного назначения", "Производство",
                 "Склад", "Торговая площадь", "Доля в квартире", "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $jCSchemaName
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateJCSchemaName(
        $jCSchemaName,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($jCSchemaName) && !in_array($object->getCategory(), [
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