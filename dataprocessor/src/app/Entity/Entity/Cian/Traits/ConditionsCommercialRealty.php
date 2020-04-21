<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Electricity;
use App\Entity\Cian\Gas;
use App\Entity\Cian\Drainage;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\ConditionsCommercialRealtyInterface;
use App\Entity\Cian\Water;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait ConditionsCommercialRealty
 * @package App\Entity\Cian\Traits
 */
trait ConditionsCommercialRealty
{
    /**
     * @var bool
     * @Serializer\SerializedName("HasLight")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasLight" })
     * @Constraints\Type("bool")
     */
    private $hasLight;

    /**
     * @var bool
     * @Serializer\SerializedName("HasHeating")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasHeating" })
     * @Constraints\Type("bool")
     */
    private $hasHeating;

    /**
     * @var bool
     * @Serializer\SerializedName("HasExtinguishingSystem")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasExtinguishingSystem" })
     * @Constraints\Type("bool")
     */
    private $hasExtinguishingSystem;

    /**
     * @var string
     * @Serializer\SerializedName("Layout")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateLayout" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCommercialRealtyInterface::LAYOUT)
     * @Constraints\Valid()
     */
    private $layout;

    /**
     * @var bool
     * @Serializer\SerializedName("HasEquipment")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasEquipment" })
     * @Constraints\Type("bool")
     */
    private $hasEquipment;

    /**
     * @var string
     * @Serializer\SerializedName("InputType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateInputType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCommercialRealtyInterface::INPUT_TYPE)
     * @Constraints\Valid()
     */
    private $inputType;

    /**
     * @var Electricity
     * @Serializer\SerializedName("Electricity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateElectricity" })
     * @Constraints\Type("App\Entity\Cian\Electricity")
     * @Constraints\Valid()
     */
    private $electricity;

    /**
     * @var Gas
     * @Serializer\SerializedName("Gas")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateGas" })
     * @Constraints\Type("App\Entity\Cian\Gas")
     * @Constraints\Valid()
     */
    private $gas;

    /**
     * @var Drainage
     * @Serializer\SerializedName("Drainage")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateDrainage" })
     * @Constraints\Type("App\Entity\Cian\Drainage")
     * @Constraints\Valid()
     */
    private $drainage;

    /**
     * @var Water
     * @Serializer\SerializedName("Water")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateWater" })
     * @Constraints\Type("App\Entity\Cian\Water")
     * @Constraints\Valid()
     */
    private $water;

    /**
     * @var string
     * @Serializer\SerializedName("DrivewayType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateDrivewayType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCommercialRealtyInterface::DRIVEWAY_TYPE)
     * @Constraints\Valid()
     */
    private $drivewayType;

    /**
     * @var string
     * @Serializer\SerializedName("FurniturePresence")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateFurniturePresence" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCommercialRealtyInterface::FURNITURE_PRESENCE)
     * @Constraints\Valid()
     */
    private $furniturePresence;

    /**
     * @var int
     * @Serializer\SerializedName("WaterPipesCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateWaterPipesCount" })
     */
    private $waterPipesCount;

    /**
     * @var bool
     * @Serializer\SerializedName("HasShopWindows")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasShopWindows" })
     * @Constraints\Type("bool")
     */
    private $hasShopWindows;

    /**
     * @var string
     * @Serializer\SerializedName("FloorMaterialTypeType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateFloorMaterialTypeType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCommercialRealtyInterface::FLOOR_MATERIAL_TYPE_TYPE)
     * @Constraints\Valid()
     */
    private $floorMaterialTypeType;

    /**
     * @var bool
     * @Serializer\SerializedName("HasSafeCustody")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasSafeCustody" })
     * @Constraints\Type("bool")
     */
    private $hasSafeCustody;

    /**
     * @var bool
     * @Serializer\SerializedName("IsCustoms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateIsCustoms" })
     * @Constraints\Type("bool")
     */
    private $isCustoms;

    /**
     * @var bool
     * @Serializer\SerializedName("HasTransportServices")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCommercialRealty", "validateHasTransportServices" })
     * @Constraints\Type("bool")
     */
    private $hasTransportServices;

    /**
     * @return bool
     */
    public function isHasLight(): bool
    {
        return $this->hasLight;
    }

    /**
     * @param bool $hasLight
     */
    public function setHasLight(bool $hasLight): void
    {
        $this->hasLight = $hasLight;
    }

    /**
     * @return bool
     */
    public function isHasHeating(): bool
    {
        return $this->hasHeating;
    }

    /**
     * @param bool $hasHeating
     */
    public function setHasHeating(bool $hasHeating): void
    {
        $this->hasHeating = $hasHeating;
    }

    /**
     * @return bool
     */
    public function isHasExtinguishingSystem(): bool
    {
        return $this->hasExtinguishingSystem;
    }

    /**
     * @param bool $hasExtinguishingSystem
     */
    public function setHasExtinguishingSystem(bool $hasExtinguishingSystem): void
    {
        $this->hasExtinguishingSystem = $hasExtinguishingSystem;
    }

    /**
     * @return string
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * @return bool
     */
    public function isHasEquipment(): bool
    {
        return $this->hasEquipment;
    }

    /**
     * @param bool $hasEquipment
     */
    public function setHasEquipment(bool $hasEquipment): void
    {
        $this->hasEquipment = $hasEquipment;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return $this->inputType;
    }

    /**
     * @param string $inputType
     */
    public function setInputType(string $inputType): void
    {
        $this->inputType = $inputType;
    }

    /**
     * @return Electricity
     */
    public function getElectricity(): Electricity
    {
        return $this->electricity;
    }

    /**
     * @param Electricity $electricity
     */
    public function setElectricity(Electricity $electricity): void
    {
        $this->electricity = $electricity;
    }

    /**
     * @return Gas
     */
    public function getGas(): Gas
    {
        return $this->gas;
    }

    /**
     * @param Gas $gas
     */
    public function setGas(Gas $gas): void
    {
        $this->gas = $gas;
    }

    /**
     * @return Drainage
     */
    public function getDrainage(): Drainage
    {
        return $this->drainage;
    }

    /**
     * @param Drainage $drainage
     */
    public function setDrainage(Drainage $drainage): void
    {
        $this->drainage = $drainage;
    }

    /**
     * @return Water
     */
    public function getWater(): Water
    {
        return $this->water;
    }

    /**
     * @param Water $water
     */
    public function setWater(Water $water): void
    {
        $this->water = $water;
    }

    /**
     * @return string
     */
    public function getDrivewayType(): string
    {
        return $this->drivewayType;
    }

    /**
     * @param string $drivewayType
     */
    public function setDrivewayType(string $drivewayType): void
    {
        $this->drivewayType = $drivewayType;
    }

    /**
     * @return string
     */
    public function getFurniturePresence(): string
    {
        return $this->furniturePresence;
    }

    /**
     * @param string $furniturePresence
     */
    public function setFurniturePresence(string $furniturePresence): void
    {
        $this->furniturePresence = $furniturePresence;
    }

    /**
     * @return int
     */
    public function getWaterPipesCount(): int
    {
        return $this->waterPipesCount;
    }

    /**
     * @param int $waterPipesCount
     */
    public function setWaterPipesCount(int $waterPipesCount): void
    {
        $this->waterPipesCount = $waterPipesCount;
    }

    /**
     * @return bool
     */
    public function isHasShopWindows(): bool
    {
        return $this->hasShopWindows;
    }

    /**
     * @param bool $hasShopWindows
     */
    public function setHasShopWindows(bool $hasShopWindows): void
    {
        $this->hasShopWindows = $hasShopWindows;
    }

    /**
     * @return bool
     */
    public function isFloorMaterialTypeType(): bool
    {
        return $this->floorMaterialTypeType;
    }

    /**
     * @param bool $floorMaterialTypeType
     */
    public function setFloorMaterialTypeType(bool $floorMaterialTypeType): void
    {
        $this->floorMaterialTypeType = $floorMaterialTypeType;
    }

    /**
     * @return bool
     */
    public function isHasSafeCustody(): bool
    {
        return $this->hasSafeCustody;
    }

    /**
     * @param bool $hasSafeCustody
     */
    public function setHasSafeCustody(bool $hasSafeCustody): void
    {
        $this->hasSafeCustody = $hasSafeCustody;
    }

    /**
     * @return bool
     */
    public function isCustoms(): bool
    {
        return $this->isCustoms;
    }

    /**
     * @param bool $isCustoms
     */
    public function setIsCustoms(bool $isCustoms): void
    {
        $this->isCustoms = $isCustoms;
    }

    /**
     * @return bool
     */
    public function isHasTransportServices(): bool
    {
        return $this->hasTransportServices;
    }

    /**
     * @param bool $hasTransportServices
     */
    public function setHasTransportServices(bool $hasTransportServices): void
    {
        $this->hasTransportServices = $hasTransportServices;
    }

    /**
     * @param $hasLight
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasLight(
        $hasLight,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasLight) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasHeating
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasHeating(
        $hasHeating,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasHeating) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasExtinguishingSystem
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasExtinguishingSystem(
        $hasExtinguishingSystem,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasExtinguishingSystem) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $layout
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLayout(
        $layout,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($layout) && in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в категориях "Гараж", аренда "Офис", продажа "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $hasEquipment
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasEquipment(
        $hasEquipment,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasEquipment) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $inputType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateInputType(


        $inputType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($inputType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Здание", "Помещение свободного назначения", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $electricity
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateElectricity(
        $electricity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($electricity) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $gas
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateGas(
        $gas,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($gas) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $drainage
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDrainage(
        $drainage,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($drainage) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $water
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateWater(
        $water,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($water) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $drivewayType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDrivewayType(
        $drivewayType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($drivewayType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $furniturePresence
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFurniturePresence(
        $furniturePresence,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($furniturePresence) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $waterPipesCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateWaterPipesCount(
        $waterPipesCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($waterPipesCount) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Офис", "Помещение свободного назначения", "Производство",'
                .'"Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasShopWindows
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasShopWindows(
        $hasShopWindows,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasShopWindows) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Помещение свободного назначения", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $floorMaterialTypeType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFloorMaterialTypeType(
        $floorMaterialTypeType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($floorMaterialTypeType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $hasSafeCustody
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasSafeCustody(
        $hasSafeCustody,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasSafeCustody) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $isCustoms
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsCustoms(
        $isCustoms,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($isCustoms) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $hasTransportServices
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasTransportServices(
        $hasTransportServices,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasTransportServices) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Производство", "Склад"'
            )->addViolation();
        }
    }
}