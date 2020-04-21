<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\InfrastructureInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


/**
 * Trait Infrastructure
 * @package App\Entity\Cian\Traits
 */
trait AllInfrastructure
{
    /**
     * @var int
     * @Serializer\SerializedName("FloorNumber")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateFloorNumber" })
     */
    private $floorNumber;
    

    /**
     * @var string
     * @Serializer\SerializedName("RepairType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateRepairType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\InfrastructureInterface::REPAIR_TYPE)
     * @Constraints\Valid()
     */
    private $repairType;

    /**
     * @var bool
     * @Serializer\SerializedName("HasInternet")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasInternet" })
     * @Constraints\Type("bool")
     */
    private $hasInternet;

    /**
     * @var bool
     * @Serializer\SerializedName("HasFurniture")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasFurniture" })
     * @Constraints\Type("bool")
     */
    private $hasFurniture;

    /**
     * @var bool
     * @Serializer\SerializedName("HasPhone")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasPhone" })
     * @Constraints\Type("bool")
     */
    private $hasPhone;

    /**
     * @var bool
     * @Serializer\SerializedName("HasKitchenFurniture")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasKitchenFurniture" })
     * @Constraints\Type("bool")
     */
    private $hasKitchenFurniture;

    /**
     * @var bool
     * @Serializer\SerializedName("HasTv")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasTv" })
     * @Constraints\Type("bool")
     */
    private $hasTv;

    /**
     * @var bool
     * @Serializer\SerializedName("HasWasher")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasWasher" })
     * @Constraints\Type("bool")
     */
    private $hasWasher;

    /**
     * @var bool
     * @Serializer\SerializedName("HasConditioner")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasConditioner" })
     * @Constraints\Type("bool")
     */
    private $hasConditioner;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBathtub")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasBathtub" })
     * @Constraints\Type("bool")
     */
    private $hasBathtub;

    /**
     * @var bool
     * @Serializer\SerializedName("HasShower")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasShower" })
     * @Constraints\Type("bool")
     */
    private $hasShower;

    /**
     * @var bool
     * @Serializer\SerializedName("HasDishwasher")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasDishwasher" })
     * @Constraints\Type("bool")
     */
    private $hasDishwasher;

    /**
     * @var bool
     * @Serializer\SerializedName("HasFridge")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasFridge" })
     * @Constraints\Type("bool")
     */
    private $hasFridge;

    /**
     * @var bool
     * @Serializer\SerializedName("HasElectricity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasElectricity" })
     * @Constraints\Type("bool")
     */
    private $hasElectricity;

    /**
     * @var bool
     * @Serializer\SerializedName("HasWater")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\AllInfrastructure", "validateHasWater" })
     * @Constraints\Type("bool")
     */
    private $hasWater;

    /**
     * @return int
     */
    public function getFloorNumber(): int
    {
        return $this->floorNumber;
    }

    /**
     * @param int $floorNumber
     */
    public function setFloorNumber(int $floorNumber): void
    {
        $this->floorNumber = $floorNumber;
    }

    /**
     * @return string
     */
    public function getRepairType(): string
    {
        return $this->repairType;
    }

    /**
     * @param string $repairType
     */
    public function setRepairType(string $repairType): void
    {
        $this->repairType = $repairType;
    }

    /**
     * @return bool
     */
    public function isHasInternet(): bool
    {
        return $this->hasInternet;
    }

    /**
     * @param bool $hasInternet
     */
    public function setHasInternet(bool $hasInternet): void
    {
        $this->hasInternet = $hasInternet;
    }

    /**
     * @return bool
     */
    public function isHasFurniture(): bool
    {
        return $this->hasFurniture;
    }

    /**
     * @param bool $hasFurniture
     */
    public function setHasFurniture(bool $hasFurniture): void
    {
        $this->hasFurniture = $hasFurniture;
    }

    /**
     * @return bool
     */
    public function isHasPhone(): bool
    {
        return $this->hasPhone;
    }

    /**
     * @param bool $hasPhone
     */
    public function setHasPhone(bool $hasPhone): void
    {
        $this->hasPhone = $hasPhone;
    }

    /**
     * @return bool
     */
    public function isHasKitchenFurniture(): bool
    {
        return $this->hasKitchenFurniture;
    }

    /**
     * @param bool $hasKitchenFurniture
     */
    public function setHasKitchenFurniture(bool $hasKitchenFurniture): void
    {
        $this->hasKitchenFurniture = $hasKitchenFurniture;
    }

    /**
     * @return bool
     */
    public function isHasTv(): bool
    {
        return $this->hasTv;
    }

    /**
     * @param bool $hasTv
     */
    public function setHasTv(bool $hasTv): void
    {
        $this->hasTv = $hasTv;
    }

    /**
     * @return bool
     */
    public function isHasWasher(): bool
    {
        return $this->hasWasher;
    }

    /**
     * @param bool $hasWasher
     */
    public function setHasWasher(bool $hasWasher): void
    {
        $this->hasWasher = $hasWasher;
    }

    /**
     * @return bool
     */
    public function isHasConditioner(): bool
    {
        return $this->hasConditioner;
    }

    /**
     * @param bool $hasConditioner
     */
    public function setHasConditioner(bool $hasConditioner): void
    {
        $this->hasConditioner = $hasConditioner;
    }

    /**
     * @return bool
     */
    public function isHasBathtub(): bool
    {
        return $this->hasBathtub;
    }

    /**
     * @param bool $hasBathtub
     */
    public function setHasBathtub(bool $hasBathtub): void
    {
        $this->hasBathtub = $hasBathtub;
    }

    /**
     * @return bool
     */
    public function isHasShower(): bool
    {
        return $this->hasShower;
    }

    /**
     * @param bool $hasShower
     */
    public function setHasShower(bool $hasShower): void
    {
        $this->hasShower = $hasShower;
    }

    /**
     * @return bool
     */
    public function isHasDishwasher(): bool
    {
        return $this->hasDishwasher;
    }

    /**
     * @param bool $hasDishwasher
     */
    public function setHasDishwasher(bool $hasDishwasher): void
    {
        $this->hasDishwasher = $hasDishwasher;
    }

    /**
     * @return bool
     */
    public function isHasFridge(): bool
    {
        return $this->hasFridge;
    }

    /**
     * @param bool $hasFridge
     */
    public function setHasFridge(bool $hasFridge): void
    {
        $this->hasFridge = $hasFridge;
    }

    /**
     * @return bool
     */
    public function isHasElectricity(): bool
    {
        return $this->hasElectricity;
    }

    /**
     * @param bool $hasElectricity
     */
    public function setHasElectricity(bool $hasElectricity): void
    {
        $this->hasElectricity = $hasElectricity;
    }

    /**
     * @return bool
     */
    public function isHasWater(): bool
    {
        return $this->hasWater;
    }

    /**
     * @param bool $hasWater
     */
    public function setHasWater(bool $hasWater): void
    {
        $this->hasWater = $hasWater;
    }

    /**
     * @param $floorNumber
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFloorNumber(
        $floorNumber,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (is_null($floorNumber) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в типе Загородная недвижимость и в категориях:'
                . '"Гараж", "Здание", "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $repairType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateRepairType(
        $repairType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($repairType) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в типе Коммерческая недвижимость и в категориях:'
                . '"Квартира в новостройке", "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasInternet
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasInternet(
        $hasInternet,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasInternet) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости и в категории "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasFurniture
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasFurniture(
        $hasFurniture,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasFurniture) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости и категориях:'
                . '"Готовый бизнес", "Здание", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasPhone
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasPhone(
        $hasPhone,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasPhone) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в типе Коммерческая недвижимость и в категориях:'
                . '"Квартира в новостройке", "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasKitchenFurniture
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasKitchenFurniture(
        $hasKitchenFurniture,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasKitchenFurniture) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasTv
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasTv(
        $hasTv,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasTv) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasWasher
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasWasher(
        $hasWasher,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasWasher) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasConditioner
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasConditioner(
        $hasConditioner,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasConditioner) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasBathtub
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBathtub(
        $hasBathtub,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBathtub) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasShower
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasShower(
        $hasShower,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasShower) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasDishwasher
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasDishwasher(
        $hasDishwasher,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasDishwasher) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasFridge
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasFridge(
        $hasFridge,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasFridge) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе аренда Городской и Загородной недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasElectricity
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasElectricity(
        $hasElectricity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasElectricity) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,

            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе продажа Загородной недвижимости и в категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasWater
     * @param ExecutionContextInterface $context
     * @param $payload
     *
     */
    public static function validateHasWater(
        $hasWater,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasWater) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий в типе продажа Загородной недвижимости и в категории "Гараж"'
            )->addViolation();
        }
    }
}