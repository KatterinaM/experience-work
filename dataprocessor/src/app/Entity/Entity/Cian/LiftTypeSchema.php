<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class LiftTypeSchema
 * @package App\Entity\Cian
 */
class LiftTypeSchema
{
    const LIFT_TYPE = [
        self::LIFT_TYPE_ESCALATOR,
        self::LIFT_TYPE_LIFT,
        self::LIFT_TYPE_TRAVELATOR
    ];

    const LIFT_TYPE_ESCALATOR = "escalator";
    const LIFT_TYPE_LIFT = "lift";
    const LIFT_TYPE_TRAVELATOR = "travelator";

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LiftTypeSchema", "validateLiftType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\LiftTypeSchema::LIFT_TYPE)
     * @Constraints\Valid()
     */
    private $liftType;

    /**
     * @var string
     * @Serializer\SerializedName("AdditionalType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LiftTypeSchema", "validateAdditionalType" })
     */
    private $additionalType;

    /**
     * @var int
     * @Serializer\SerializedName("Count")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LiftTypeSchema", "validateLiftCount" })
     */
    private $liftCount;

    /**
     * @var int
     * @Serializer\SerializedName("LoadCapacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\LiftTypeSchema", "validateLiftLoadCapacity" })
     */
    private $liftLoadCapacity;

    /**
     * @return string
     */
    public function getLiftType(): string
    {
        return $this->liftType;
    }

    /**
     * @param string $liftType
     */
    public function setLiftType(string $liftType): void
    {
        $this->liftType = $liftType;
    }

    /**
     * @return string
     */
    public function getAdditionalType(): string
    {
        return $this->additionalType;
    }

    /**
     * @param string $additionalType
     */
    public function setAdditionalType(string $additionalType): void
    {
        $this->additionalType = $additionalType;
    }

    /**
     * @return int
     */
    public function getLiftCount(): int
    {
        return $this->liftCount;
    }

    /**
     * @param int $liftCount
     */
    public function setLiftCount(int $liftCount): void
    {
        $this->liftCount = $liftCount;
    }

    /**
     * @return int
     */
    public function getLiftLoadCapacity(): int
    {
        return $this->liftLoadCapacity;
    }

    /**
     * @param int $liftLoadCapacity
     */
    public function setLiftLoadCapacity(int $liftLoadCapacity): void
    {
        $this->liftLoadCapacity = $liftLoadCapacity;
    }

    /**
     * @param $liftType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLiftType(
        $liftType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($liftType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Производсво", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $additionalType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateAdditionalType(
        $additionalType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($additionalType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Производсво", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $liftCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLiftCount(
        $liftCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($liftCount) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Здание", "Производсво", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $liftLoadCapacity
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLiftLoadCapacity(
        $liftLoadCapacity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($liftLoadCapacity) && !in_array($object->getCategory(), array(
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

}