<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\OwnershipInterface;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Ownership
 * @package App\Entity\Cian\Traits
 */
trait Ownership
{
    /**
     * @var string
     * @Serializer\SerializedName("AvailableFrom")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Ownership", "validateAvailableFrom" })
     */
    private $availableFrom;

    /**
     * @var int
     * @Serializer\SerializedName("TaxNumber")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Ownership", "validateTaxNumber" })
     */
    private $taxNumber;

    /**
     * @var string
     * @Serializer\SerializedName("EstateType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Ownership", "validateEstateType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\OwnershipInterface::ESTATE_TYPE)
     */
    private $estateType;

    /**
     * @var bool
     * @Serializer\SerializedName("IsLegalAddressProvided")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\Ownership", "validateIsLegalAddressProvided" })
     * @Constraints\Type("bool")
     */
    private $isLegalAddressProvided;

    /**
     * @return string
     */
    public function getAvailableFrom(): string
    {
        return $this->availableFrom;
    }

    /**
     * @param string $availableFrom
     */
    public function setAvailableFrom(string $availableFrom): void
    {
        $this->availableFrom = $availableFrom;
    }

    /**
     * @return int
     */
    public function getTaxNumber(): int
    {
        return $this->taxNumber;
    }

    /**
     * @param int $taxNumber
     */
    public function setTaxNumber(int $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }

    /**
     * @return string
     */
    public function getEstateType(): string
    {
        return $this->estateType;
    }

    /**
     * @param string $estateType
     */
    public function setEstateType(string $estateType): void
    {
        $this->estateType = $estateType;
    }

    /**
     * @return bool
     */
    public function isLegalAddressProvided(): bool
    {
        return $this->isLegalAddressProvided;
    }

    /**
     * @param bool $isLegalAddressProvided
     */
    public function setIsLegalAddressProvided(bool $isLegalAddressProvided): void
    {
        $this->isLegalAddressProvided = $isLegalAddressProvided;
    }

    /**
     * @param $availableFrom
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateAvailableFrom(
        $availableFrom,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($availableFrom) && in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в категориях "Гараж" и "Готовый бизнес" продажа'
            )->addViolation();
        }
    }

    /**
     * @param $taxNumber
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateTaxNumber(
        $taxNumber,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($taxNumber) && in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется в категориях "Гараж" и "Готовый бизнес" продажа'
            )->addViolation();
        }
    }

    /**
     * @param $estateType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateEstateType(
        $estateType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($estateType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категории "Готовый бизнес"'
            )->addViolation();
        }
    }

    /**
     * @param $isLegalAddressProvided
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsLegalAddressProvided(
        $isLegalAddressProvided,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($isLegalAddressProvided) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Помещение свободного назначения", "Производство", "Склад",'
                .'"Торговая площадь"'
            )->addViolation();
        }
    }
}