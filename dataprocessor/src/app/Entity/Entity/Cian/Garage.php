<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\CommercialObject;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Garage
 * @package App\Entity\Cian
 */
class Garage
{
    const GARAGE_TYPE = [
        self::GARAGE_TYPE_BOX,
        self::GARAGE_TYPE_GARAGE,
        self::GARAGE_TYPE_PARKING_PLACE
    ];

    const GARAGE_TYPE_BOX = "box";
    const GARAGE_TYPE_GARAGE = "garage";
    const GARAGE_TYPE_PARKING_PLACE = "parkingPlace";

    const GARAGE_GARAGE_TYPE = [
        self::GARAGE_GARAGE_TYPE_BUILT_IN,
        self::GARAGE_GARAGE_TYPE_CAPITAL,
        self::GARAGE_GARAGE_TYPE_SAMOSTROY,
        self::GARAGE_GARAGE_TYPE_SHELL
    ];

    const GARAGE_GARAGE_TYPE_BUILT_IN = "builtIn";
    const GARAGE_GARAGE_TYPE_CAPITAL = "capital";
    const GARAGE_GARAGE_TYPE_SAMOSTROY = "samostroy";
    const GARAGE_GARAGE_TYPE_SHELL = "shell";

    const MATERIAL = [
        self::MATERIAL_BRICK,
        self::MATERIAL_METAL,
    ];

    const MATERIAL_BRICK = "brick";
    const MATERIAL_METAL = "metal";

    const GARAGE_STATUS = [
        self::GARAGE_STATUS_BY_PROXY,
        self::GARAGE_STATUS_COOPERATIVE,
        self::GARAGE_STATUS_OWNERSHIP
    ];

    const GARAGE_STATUS_BY_PROXY = "byProxy";
    const GARAGE_STATUS_COOPERATIVE = "cooperative";
    const GARAGE_STATUS_OWNERSHIP = "ownership";

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Garage::GARAGE_TYPE)
     * @Constraints\Callback({ "\App\Entity\Cian\Garage", "validateGarageType" })
     */
    private $garageType;

    /**
     * @var string
     * @Serializer\SerializedName("GarageType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Garage::GARAGE_GARAGE_TYPE)
     * @Constraints\Callback({ "\App\Entity\Cian\Garage", "validateGarageGarageType" })
     */
    private $garageGarageType;

    /**
     * @var string
     * @Serializer\SerializedName("Material")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Garage::MATERIAL)
     * @Constraints\Callback({ "\App\Entity\Cian\Garage", "validateMaterial" })
     */
    private $material;

    /**
     * @var string
     * @Serializer\SerializedName("Status")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\Garage::GARAGE_STATUS)
     * @Constraints\Callback({ "\App\Entity\Cian\Garage", "validateGarageStatus" })
     */
    private $garageStatus;

    /**
     * @return string
     */
    public function getGarageType(): string
    {
        return $this->garageType;
    }

    /**
     * @param string $garageType
     */
    public function setGarageType(string $garageType): void
    {
        $this->garageType = $garageType;
    }

    /**
     * @return string
     */
    public function getGarageGarageType(): string
    {
        return $this->garageGarageType;
    }

    /**
     * @param string $garageGarageType
     */
    public function setGarageGarageType(string $garageGarageType): void
    {
        $this->garageGarageType = $garageGarageType;
    }

    /**
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->material;
    }

    /**
     * @param string $material
     */
    public function setMaterial(string $material): void
    {
        $this->material = $material;
    }

    /**
     * @return string
     */
    public function getGarageStatus(): string
    {
        return $this->garageStatus;
    }

    /**
     * @param string $garageStatus
     */
    public function setGarageStatus(string $garageStatus): void
    {
        $this->garageStatus = $garageStatus;
    }


    /**
     * @param $garageType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateGarageType(
        $garageType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var CommercialObject $object */
        $object = $context->getObject();

        if (is_null($garageType) && in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $garageGarageType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateGarageGarageType(
        $garageGarageType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($garageGarageType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $material
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateMaterial(
        $material,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($material) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $garageStatus
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateGarageStatus(
        $garageStatus,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($garageStatus) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Гараж"'
            )->addViolation();
        }
    }
}