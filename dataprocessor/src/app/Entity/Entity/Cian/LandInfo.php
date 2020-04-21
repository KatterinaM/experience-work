<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class LandInfo
 * @package App\Entity\Cian
 */
class LandInfo
{
    const AREA_UNIT_TYPE = [
        self::AREA_UNIT_TYPE_HECTARE,
        self::AREA_UNIT_TYPE_SOTKA
    ];

    const AREA_UNIT_TYPE_HECTARE = "hectare";
    const AREA_UNIT_TYPE_SOTKA = "sotka";

    const LAND_TYPE = [
        self::LAND_TYPE_OWNED,
        self::LAND_TYPE_RENT
    ];

    const LAND_TYPE_OWNED = "owned";
    const LAND_TYPE_RENT = "rent";

    const LAND_STATUS = [
        self::LAND_STATUS_FOR_AGRICULTURAL_PURPOSES,
        self::LAND_STATUS_INDUSTRY_TRANSPORT_COMMUNICATION,
        self::LAND_STATUS_SETTLEMENTS,
    ];

    const LAND_STATUS_FOR_AGRICULTURAL_PURPOSES = "forAgriculturalPurposes";
    const LAND_STATUS_INDUSTRY_TRANSPORT_COMMUNICATION = "industryTransportCommunications";
    const LAND_STATUS_SETTLEMENTS = "settlements";

    /**
     * @var double
     * @Serializer\SerializedName("Area")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LandInfo", "validateLandArea" })
     */
    private $landArea;

    /**
     * @var string
     * @Serializer\SerializedName("AreaUnitType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\LandInfo::AREA_UNIT_TYPE)
     * @Constraints\Callback({ "App\Entity\Cian\LandInfo", "validateLandAreaUnitType" })
     */
    private $landAreaUnitType;

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Callback({ "App\Entity\Cian\LandInfo", "validateLandType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\LandInfo::LAND_TYPE)
     * @Constraints\Valid()
     */
    private $landType;

    /**
     * @var string
     * @Serializer\SerializedName("Status")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Callback({ "App\Entity\Cian\LandInfo", "validateLandStatus" })
     * @Constraints\Choice(choices = \App\Entity\Cian\LandInfo::LAND_STATUS)
     * @Constraints\Valid()
     */
    private $landStatus;

    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToChangeStatus")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LandInfo", "validatePossibleToChangeStatus" })\
     * @Constraints\Type("bool")
     */
    private $possibleToChangeStatus;

    /**
     * @return float
     */
    public function getLandArea(): float
    {
        return $this->landArea;
    }

    /**
     * @param float $landArea
     */
    public function setLandArea(float $landArea): void
    {
        $this->landArea = $landArea;
    }

    /**
     * @return string
     */
    public function getLandAreaUnitType(): string
    {
        return $this->landAreaUnitType;
    }

    /**
     * @param string $landAreaUnitType
     */
    public function setLandAreaUnitType(string $landAreaUnitType): void
    {
        $this->landAreaUnitType = $landAreaUnitType;
    }

    /**
     * @return string
     */
    public function getLandType(): string
    {
        return $this->landType;
    }

    /**
     * @param string $landType
     */
    public function setLandType(string $landType): void
    {
        $this->landType = $landType;
    }

    /**
     * @return string
     */
    public function getLandStatus(): string
    {
        return $this->landStatus;
    }

    /**
     * @param string $landStatus
     */
    public function setLandStatus(string $landStatus): void
    {
        $this->landStatus = $landStatus;
    }

    /**
     * @return bool
     */
    public function isPossibleToChangeStatus(): bool
    {
        return $this->possibleToChangeStatus;
    }

    /**
     * @param bool $possibleToChangeStatus
     */
    public function setPossibleToChangeStatus(bool $possibleToChangeStatus): void
    {
        $this->possibleToChangeStatus = $possibleToChangeStatus;
    }

    /**
     * @param $landArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLandArea(
        $landArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((!is_null($landArea) && !in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                ])) || (is_null($landArea) && in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                ]))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Загородной недвижимости'
                .'и для всех категорий в типе Коммерческой недвижимости, кроме "Гараж", "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $landAreaUnitType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLandAreaUnitType(
        $landAreaUnitType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((!is_null($landAreaUnitType) && !in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                ])) || (is_null($landAreaUnitType) && in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                ]))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Загородной недвижимости'
                .'и для всех категорий в типе Коммерческой недвижимости, кроме "Гараж", "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $landType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLandType(
        $landType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($landType) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в типе Загородной недвижимости и категориях "Гараж", "Готовый бизнес", "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $landStatus
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLandStatus(
        $landStatus,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($landStatus) && in_array($object->getCategory(), [
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE
                ])) || (!is_null($landStatus) && !in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE
                ]))) {
            $context->buildViolation(
                'Данное поле заполняется в категориях "Коммерческая земля", "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $possibleToChangeStatus
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePossibleToChangeStatus(
        $possibleToChangeStatus,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($possibleToChangeStatus) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

}