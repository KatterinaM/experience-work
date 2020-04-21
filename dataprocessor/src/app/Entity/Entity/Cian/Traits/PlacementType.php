<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Specialty;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait PlacementType
 * @package App\Entity\Cian\Traits
 */
trait PlacementType
{
    /**
     * @var string
     * @Serializer\SerializedName("PlacementType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\PlacementType", "validatePlacementType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\PlacementTypeInterface::PLACEMENT_TYPE)
     * @Constraints\Valid()
     */
    private $placementType;

    /**
     * @var string
     * @Serializer\SerializedName("PropertyType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\PlacementType", "validatePropertyType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\PlacementTypeInterface::PROPERTY_TYPE)
     * @Constraints\Valid()
     */
    private $propertyType;

    /**
     * @var Specialty
     * @Serializer\SerializedName("Specialty")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("\App\Entity\Cian\Specialty")
     * @Constraints\Callback({ "App\Entity\Cian\Traits\PlacementType", "validateSpecialty" })
     * @Constraints\Valid()
     */
    private $specialty;

    /**
     * @var string
     * @Serializer\SerializedName("PermittedUseType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\PlacementType", "validatePermittedUseType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\PlacementTypeInterface::PERMITTED_USE_TYPE)
     * @Constraints\Valid()
     */
    private $permittedUseType;

    /**
     * @var bool
     * @Serializer\SerializedName("PossibleToChangePermitedUseType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\PlacementType", "validatePossibleToChangePermitedUseType" })
     * @Constraints\Type("bool")
     */
    private $possibleToChangePermitedUseType;

    /**
     * @return string
     */
    public function getPlacementType(): string
    {
        return $this->placementType;
    }

    /**
     * @param string $placementType
     */
    public function setPlacementType(string $placementType): void
    {
        $this->placementType = $placementType;
    }

    /**
     * @return string
     */
    public function getPropertyType(): string
    {
        return $this->propertyType;
    }

    /**
     * @param string $propertyType
     */
    public function setPropertyType(string $propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    /**
     * @return Specialty
     */
    public function getSpecialty(): Specialty
    {
        return $this->specialty;
    }

    /**
     * @param Specialty $specialty
     */
    public function setSpecialty(Specialty $specialty): void
    {
        $this->specialty = $specialty;
    }

    /**
     * @return string
     */
    public function getPermittedUseType(): string
    {
        return $this->permittedUseType;
    }

    /**
     * @param string $permittedUseType
     */
    public function setPermittedUseType(string $permittedUseType): void
    {
        $this->permittedUseType = $permittedUseType;
    }

    /**
     * @return bool
     */
    public function isPossibleToChangePermitedUseType(): bool
    {
        return $this->possibleToChangePermitedUseType;
    }

    /**
     * @param bool $possibleToChangePermitedUseType
     */
    public function setPossibleToChangePermitedUseType(bool $possibleToChangePermitedUseType): void
    {
        $this->possibleToChangePermitedUseType = $possibleToChangePermitedUseType;
    }

    /**
     * @param $placementType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePlacementType(
        $placementType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($placementType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $propertyType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePropertyType(
        $propertyType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($propertyType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $specialty
     * @param ExecutionContextInterface $context
     * @param $payload
     *
     */
    public static function validateSpecialty(
        $specialty,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($specialty) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий: "Готовый бизнес", "Помещение свободного назначения", "Торговая площадь", '
            )->addViolation();
        }
    }

    /**
     * @param $permittedUseType
     * @param ExecutionContextInterface $context
     * @param $payload
     *
     */
    public static function validatePermittedUseType(
        $permittedUseType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($permittedUseType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $possibleToChangePermitedUseType
     * @param ExecutionContextInterface $context
     * @param $payload
     *
     */
    public static function validatePossibleToChangePermitedUseType(
        $possibleToChangePermitedUseType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($possibleToChangePermitedUseType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Коммерческая земля"'
            )->addViolation();
        }
    }
}