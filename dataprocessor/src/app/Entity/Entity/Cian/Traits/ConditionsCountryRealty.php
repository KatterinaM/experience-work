<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\ConditionsCountryRealtyInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait ConditionsCountryRealty
 * @package App\Entity\Cian\Traits
 */
trait ConditionsCountryRealty
{
    /**
     * @var string
     * @Serializer\SerializedName("SettlementName")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $settlementName;

    /**
     * @var int
     * @Serializer\SerializedName("BedroomsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateBedroomsCount" })
     */
    private $bedroomsCount;

    /**
     * @var string
     * @Serializer\SerializedName("WcLocationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateWcLocationType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCountryRealtyInterface::WC_LOCATION_TYPE)
     * @Constraints\Valid()
     */
    private $wcLocationType;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBathhouse")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasBathhouse" })
     * @Constraints\Type("bool")
     */
    private $hasBathhouse;

    /**
     * @var bool
     * @Serializer\SerializedName("HasGarage")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasGarage" })
     * @Constraints\Type("bool")
     */
    private $hasGarage;

    /**
     * @var bool
     * @Serializer\SerializedName("HasPool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasPool" })
     * @Constraints\Type("bool")
     */
    private $hasPool;

    /**
     * @var bool
     * @Serializer\SerializedName("HasGas")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasGas" })
     * @Constraints\Type("bool")
     */
    private $hasGas;

    /**
     * @var bool
     * @Serializer\SerializedName("HasDrainage")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasDrainage" })
     * @Constraints\Type("bool")
     */
    private $hasDrainage;

    /**
     * @var bool
     * @Serializer\SerializedName("HasSecurity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateHasSecurity" })
     * @Constraints\Type("bool")
     */
    private $hasSecurity;

    /**
     * @var int
     * @Serializer\Type("KP\Id")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCountryRealty", "validateKpId" })
     */
    private $kpId;

    /**
     * @return string
     */
    public function getSettlementName(): string
    {
        return $this->settlementName;
    }

    /**
     * @param string $settlementName
     */
    public function setSettlementName(string $settlementName): void
    {
        $this->settlementName = $settlementName;
    }

    /**
     * @return int
     */
    public function getBedroomsCount(): int
    {
        return $this->bedroomsCount;
    }

    /**
     * @param int $bedroomsCount
     */
    public function setBedroomsCount(int $bedroomsCount): void
    {
        $this->bedroomsCount = $bedroomsCount;
    }

    /**
     * @return string
     */
    public function getWcLocationType(): string
    {
        return $this->wcLocationType;
    }

    /**
     * @param string $wcLocationType
     */
    public function setWcLocationType(string $wcLocationType): void
    {
        $this->wcLocationType = $wcLocationType;
    }

    /**
     * @return bool
     */
    public function isHasBathhouse(): bool
    {
        return $this->hasBathhouse;
    }

    /**
     * @param bool $hasBathhouse
     */
    public function setHasBathhouse(bool $hasBathhouse): void
    {
        $this->hasBathhouse = $hasBathhouse;
    }

    /**
     * @return bool
     */
    public function isHasGarage(): bool
    {
        return $this->hasGarage;
    }

    /**
     * @param bool $hasGarage
     */
    public function setHasGarage(bool $hasGarage): void
    {
        $this->hasGarage = $hasGarage;
    }

    /**
     * @return bool
     */
    public function isHasPool(): bool
    {
        return $this->hasPool;
    }

    /**
     * @param bool $hasPool
     */
    public function setHasPool(bool $hasPool): void
    {
        $this->hasPool = $hasPool;
    }

    /**
     * @return bool
     */
    public function isHasGas(): bool
    {
        return $this->hasGas;
    }

    /**
     * @param bool $hasGas
     */
    public function setHasGas(bool $hasGas): void
    {
        $this->hasGas = $hasGas;
    }

    /**
     * @return bool
     */
    public function isHasDrainage(): bool
    {
        return $this->hasDrainage;
    }

    /**
     * @param bool $hasDrainage
     */
    public function setHasDrainage(bool $hasDrainage): void
    {
        $this->hasDrainage = $hasDrainage;
    }


    /**
     * @return bool
     */
    public function isHasSecurity(): bool
    {
        return $this->hasSecurity;
    }

    /**
     * @param bool $hasSecurity
     */
    public function setHasSecurity(bool $hasSecurity): void
    {
        $this->hasSecurity = $hasSecurity;
    }

    /**
     * @return int
     */
    public function getKpId(): int
    {
        return $this->kpId;
    }

    /**
     * @param int $kpId
     */
    public function setKpId(int $kpId): void
    {
        $this->kpId = $kpId;
    }

    /**
     * @param $bedroomsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBedroomsCount(
        $bedroomsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($bedroomsCount) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $wcLocationType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateWcLocationType(
        $wcLocationType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($wcLocationType) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBathhouse
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBathhouse(
        $hasBathhouse,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBathhouse) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasGarage
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasGarage(
        $hasGarage,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasGarage) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasPool
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasPool(
        $hasPool,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasPool) && in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $hasGas
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasGas(
        $hasGas,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasGas) && !in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasDrainage
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasDrainage(
        $hasDrainage,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasDrainage) && !in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $hasSecurity
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasSecurity(
        $hasSecurity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasSecurity) && !in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для всех категорий типа продажа "Загородной" недвижимости, кроме "Участок"'
            )->addViolation();
        }
    }

    /**
     * @param $kpId
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateKpId(
        $kpId,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($kpId) && !in_array($object->getCategory(), [
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для типа продажа "Загородной" недвижимости'
            )->addViolation();
        }
    }
}