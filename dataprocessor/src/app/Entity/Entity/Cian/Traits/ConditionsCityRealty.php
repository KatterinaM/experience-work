<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\ConditionsCityRealtyInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait ConditionsCityRealty
 * @package App\Entity\Cian\Traits
 */
trait ConditionsCityRealty
{
    /**
     * @var double
     * @Serializer\SerializedName("LivingArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCityRealty", "validateLivingArea" })
     */
    private $livingArea;

    /**
     * @var double
     * @Serializer\SerializedName("KitchenArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $kitchenArea;

    /**
     * @var int
     * @Serializer\SerializedName("LoggiasCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $loggiasCount;

    /**
     * @var int
     * @Serializer\SerializedName("BalconiesCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $balconiesCount;

    /**
     * @var string
     * @Serializer\SerializedName("WindowsViewType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ConditionsCityRealty", "validateWindowsViewType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\ConditionsCityRealtyInterface::WINDOWS_VIEW_TYPE)
     * @Constraints\Valid()
     */
    private $windowsViewType;

    /**
     * @var int
     * @Serializer\SerializedName("SeparateWcsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $separateWcsCount;

    /**
     * @var int
     * @Serializer\SerializedName("CombinedWcsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $combinedWcsCount;

    /**
     * @var bool
     * @Serializer\SerializedName("HasRamp")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $hasRamp;

    /**
     * @return float
     */
    public function getLivingArea(): float
    {
        return $this->livingArea;
    }

    /**
     * @param float $livingArea
     */
    public function setLivingArea(float $livingArea): void
    {
        $this->livingArea = $livingArea;
    }

    /**
     * @return float
     */
    public function getKitchenArea(): float
    {
        return $this->kitchenArea;
    }

    /**
     * @param float $kitchenArea
     */
    public function setKitchenArea(float $kitchenArea): void
    {
        $this->kitchenArea = $kitchenArea;
    }

    /**
     * @return int
     */
    public function getLoggiasCount(): int
    {
        return $this->loggiasCount;
    }

    /**
     * @param int $loggiasCount
     */
    public function setLoggiasCount(int $loggiasCount): void
    {
        $this->loggiasCount = $loggiasCount;
    }

    /**
     * @return int
     */
    public function getBalconiesCount(): int
    {
        return $this->balconiesCount;
    }

    /**
     * @param int $balconiesCount
     */
    public function setBalconiesCount(int $balconiesCount): void
    {
        $this->balconiesCount = $balconiesCount;
    }

    /**
     * @return string
     */
    public function getWindowsViewType(): string
    {
        return $this->windowsViewType;
    }

    /**
     * @param string $windowsViewType
     */
    public function setWindowsViewType(string $windowsViewType): void
    {
        $this->windowsViewType = $windowsViewType;
    }

    /**
     * @return int
     */
    public function getSeparateWcsCount(): int
    {
        return $this->separateWcsCount;
    }

    /**
     * @param int $separateWcsCount
     */
    public function setSeparateWcsCount(int $separateWcsCount): void
    {
        $this->separateWcsCount = $separateWcsCount;
    }

    /**
     * @return int
     */
    public function getCombinedWcsCount(): int
    {
        return $this->combinedWcsCount;
    }

    /**
     * @param int $combinedWcsCount
     */
    public function setCombinedWcsCount(int $combinedWcsCount): void
    {
        $this->combinedWcsCount = $combinedWcsCount;
    }

    /**
     * @return bool
     */
    public function isHasRamp(): bool
    {
        return $this->hasRamp;
    }

    /**
     * @param bool $hasRamp
     */
    public function setHasRamp(bool $hasRamp): void
    {
        $this->hasRamp = $hasRamp;
    }

    /**
     * @param $livingArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateLivingArea(
        $livingArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($livingArea) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }

    /**
     * @param $windowsViewType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateWindowsViewType(
        $windowsViewType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($windowsViewType) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категории "Койко-место", "Комната"'
            )->addViolation();
        }
    }
}