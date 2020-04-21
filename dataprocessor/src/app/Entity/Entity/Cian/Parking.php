<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\BuildingInterface;
use App\Entity\Cian\Base\BargainTermsInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Parking
 * @package App\Entity\Cian
 */
class Parking
{
    const PARKING_TYPE = [
        self::PARKING_TYPE_GROUND,
        self::PARKING_TYPE_MULTILEVEL,
        self::PARKING_TYPE_OPEN,
        self::PARKING_TYPE_ROOF,
        self::PARKING_TYPE_UNDERGROUND,
    ];

    const PARKING_TYPE_GROUND = "ground";
    const PARKING_TYPE_MULTILEVEL = "multilevel";
    const PARKING_TYPE_OPEN = "open";
    const PARKING_TYPE_ROOF = "roof";
    const PARKING_TYPE_UNDERGROUND = "underground";

    const PARKING_LOCATION_TYPE = [
        self::PARKING_LOCATION_TYPE_EXTERNAL,
        self::PARKING_LOCATION_TYPE_INTERNAL
    ];

    const PARKING_LOCATION_TYPE_EXTERNAL = "external";
    const PARKING_LOCATION_TYPE_INTERNAL = "internal";

    const PURPOSE_TYPE = [
        self::PURPOSE_TYPE_CARGO,
        self::PURPOSE_TYPE_PASSENGER
    ];

    const PURPOSE_TYPE_CARGO = "cargo";
    const PURPOSE_TYPE_PASSENGER = "passenger";

    const CURRENCY = [
        self::CURRENCY_EUR,
        self::CURRENCY_RUR,
        self::CURRENCY_USD
    ];

    const CURRENCY_EUR = "eur";
    const CURRENCY_RUR = "rur";
    const CURRENCY_USD = "usd";


    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validateParkingType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\BuildingInterface::PARKING_TYPE)
     * @Constraints\Valid()
     */
    private $parkingType;

    /**
     * @var int
     * @Serializer\SerializedName("PlacesCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validatePlacesCount" })
     */
    private $placesCount;

    /**
     * @var double
     * @Serializer\SerializedName("PriceMonthly")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validatePriceMonthly" })
     */
    private $priceMonthly;

    /**
     * @var string
     * @Serializer\SerializedName("LocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validateParkingLocationType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\BuildingInterface::PARKING_LOCATION_TYPE)
     * @Constraints\Valid()
     */
    private $parkingLocationType;

    /**
     * @var string
     * @Serializer\SerializedName("PurposeType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validatePurposeType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\BuildingInterface::PURPOSE_TYPE)
     * @Constraints\Valid()
     */
    private $purposeType;

    /**
     * @var double
     * @Serializer\SerializedName("PriceEntry")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validatePriceEntry" })
     */
    private $priceEntry;

    /**
     * @var string
     * @Serializer\SerializedName("Currency")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validateParkingCurrency" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\BargainTermsInterface::CURRENCY)
     * @Constraints\Valid()
     */
    private $parkingCurrency;

    /**
     * @var bool
     * @Serializer\SerializedName("IsFree")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validateIsFree" })
     */
    private $isFree;

    /**
     * @var Deadline
     * @Serializer\SerializedName("Deadline")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Parking", "validateDeadline" })
     * @Constraints\Type("App\Entity\Cian\Deadline")
     * @Constraints\Valid()
     */
    private $deadline;

    /**
     * @return string
     */
    public function getParkingType(): string
    {
        return $this->parkingType;
    }

    /**
     * @param string $parkingType
     */
    public function setParkingType(string $parkingType): void
    {
        $this->parkingType = $parkingType;
    }

    /**
     * @return int
     */
    public function getPlacesCount(): int
    {
        return $this->placesCount;
    }

    /**
     * @param int $placesCount
     */
    public function setPlacesCount(int $placesCount): void
    {
        $this->placesCount = $placesCount;
    }

    /**
     * @return float
     */
    public function getPriceMonthly(): float
    {
        return $this->priceMonthly;
    }

    /**
     * @param float $priceMonthly
     */
    public function setPriceMonthly(float $priceMonthly): void
    {
        $this->priceMonthly = $priceMonthly;
    }

    /**
     * @return string
     */
    public function getParkingLocationType(): string
    {
        return $this->parkingLocationType;
    }

    /**
     * @param string $parkingLocationType
     */
    public function setParkingLocationType(string $parkingLocationType): void
    {
        $this->parkingLocationType = $parkingLocationType;
    }

    /**
     * @return string
     */
    public function getPurposeType(): string
    {
        return $this->purposeType;
    }

    /**
     * @param string $purposeType
     */
    public function setPurposeType(string $purposeType): void
    {
        $this->purposeType = $purposeType;
    }

    /**
     * @return float
     */
    public function getPriceEntry(): float
    {
        return $this->priceEntry;
    }

    /**
     * @param float $priceEntry
     */
    public function setPriceEntry(float $priceEntry): void
    {
        $this->priceEntry = $priceEntry;
    }

    /**
     * @return string
     */
    public function getParkingCurrency(): string
    {
        return $this->parkingCurrency;
    }

    /**
     * @param string $parkingCurrency
     */
    public function setParkingCurrency(string $parkingCurrency): void
    {
        $this->parkingCurrency = $parkingCurrency;
    }

    /**
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->isFree;
    }

    /**
     * @param bool $isFree
     */
    public function setIsFree(bool $isFree): void
    {
        $this->isFree = $isFree;
    }

    /**
     * @return Deadline
     */
    public function getDeadline(): Deadline
    {
        return $this->deadline;
    }

    /**
     * @param Deadline $deadline
     */
    public function setDeadline(Deadline $deadline): void
    {
        $this->deadline = $deadline;
    }

    /**
     * @param $parkingType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateParkingType(
        $parkingType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($parkingType) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Городская" недвижимость и категорий "Гараж", "Здание", "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $placesCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePlacesCount(
        $placesCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($placesCount) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Офис", "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $priceMonthly
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePriceMonthly(
        $priceMonthly,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($priceMonthly) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $parkingLocationType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateParkingLocationType(
        $parkingLocationType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($parkingLocationType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $purposeType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePurposeType(
        $purposeType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($purposeType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $priceEntry
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePriceEntry(
        $priceEntry,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($priceEntry) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $parkingCurrency
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateParkingCurrency(
        $parkingCurrency,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($parkingCurrency) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис" продажа, "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $isFree
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsFree(
        $isFree,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($isFree) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Офис", "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $deadline
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDeadline(
        $deadline,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($deadline) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Квартира в новостройке"'
            )->addViolation();
        }
    }
}