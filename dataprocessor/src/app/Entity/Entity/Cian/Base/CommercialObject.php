<?php

namespace App\Entity\Cian\Base;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\BusinessShoppingCenterId;
use App\Entity\Cian\Garage;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\CommercialCategoryType;
use App\Entity\Cian\Traits\ConditionsCommercialRealty;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\JCSchema;
use App\Entity\Cian\Traits\PlacementType;
use App\Entity\Cian\Traits\Ownership;
use App\Entity\Cian\Traits\Land;
use App\Entity\Cian\Traits\TotalArea;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class CommercialObject
 * @package App\Entity\Cian\Base
 */
class CommercialObject extends AbstractObject
{
    use CommercialCategoryType;
    use JCSchema;
    use AllInfrastructure;
    use PlacementType;
    use ConditionsCommercialRealty;
    use Ownership;
    use Land;
    use TotalArea;
    use BargainTerms;
    use Building;


    const CONDITION_TYPE_COSMETIC_REPAIRS_REQUIRED = 'cosmeticRepairsRequired';
    const CONDITION_TYPE_DESIGN = 'design';
    const CONDITION_TYPE_FINISHING = 'finishing';
    const CONDITION_TYPE_MAJOR_REPAIRS_REQUIRED = 'majorRepairsRequired';
    const CONDITION_TYPE_TYPICAL = 'typical';
    const CONDITION_TYPE_OFFICE = 'office';

    const CONDITION_TYPE = [
        self::CONDITION_TYPE_COSMETIC_REPAIRS_REQUIRED,
        self::CONDITION_TYPE_DESIGN,
        self::CONDITION_TYPE_FINISHING,
        self::CONDITION_TYPE_MAJOR_REPAIRS_REQUIRED,
        self::CONDITION_TYPE_TYPICAL,
        self::CONDITION_TYPE_OFFICE,
    ];

    /**
     * @var double
     * @Serializer\SerializedName("MinArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateMinArea" })
     */
    private $minArea;

    /**
     * @var string
     * @Serializer\SerializedName("ConditionType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateConditionType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\CommercialObject::CONDITION_TYPE)
     * @Constraints\Valid()
     */
    private $conditionType;

    /**
     * @var bool
     * @Serializer\SerializedName("HasInvestmentProject")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateHasInvestmentProject" })
     * @Constraints\Type("bool")
     */
    private $hasInvestmentProject;

    /**
     * @var bool
     * @Serializer\SerializedName("HasEncumbrances")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateHasEncumbrances" })
     * @Constraints\Type("bool")
     */
    private $hasEncumbrances;

    /**
     * @var bool
     * @Serializer\SerializedName("IsOccupied")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateIsOccupied" })
     * @Constraints\Type("bool")
     */
    private $isOccupied;

    /**
     * @var BusinessShoppingCenterId
     * @Serializer\SerializedName("BusinessShoppingCenter")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\BusinessShoppingCenterId")
     * @Constraints\Callback({ "App\Entity\Cian\Base\CommercialObject", "validateBusinessShoppingCenterId" })
     */
    private $businessShoppingCenter;

    /**
     * @var Garage
     * @Serializer\SerializedName("Garage")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Garage")
     * @Constraints\Valid()
     */
    private $garage;

    /**
     * @return float
     */
    public function getMinArea(): float
    {
        return $this->minArea;
    }

    /**
     * @param float $minArea
     */
    public function setMinArea(float $minArea): void
    {
        $this->minArea = $minArea;
    }

    /**
     * @return string
     */
    public function getConditionType(): string
    {
        return $this->conditionType;
    }

    /**
     * @param string $conditionType
     */
    public function setConditionType(string $conditionType): void
    {
        $this->conditionType = $conditionType;
    }

    /**
     * @return bool
     */
    public function isHasInvestmentProject(): bool
    {
        return $this->hasInvestmentProject;
    }

    /**
     * @param bool $hasInvestmentProject
     */
    public function setHasInvestmentProject(bool $hasInvestmentProject): void
    {
        $this->hasInvestmentProject = $hasInvestmentProject;
    }

    /**
     * @return bool
     */
    public function isHasEncumbrances(): bool
    {
        return $this->hasEncumbrances;
    }

    /**
     * @param bool $hasEncumbrances
     */
    public function setHasEncumbrances(bool $hasEncumbrances): void
    {
        $this->hasEncumbrances = $hasEncumbrances;
    }

    /**
     * @return bool
     */
    public function isOccupied(): bool
    {
        return $this->isOccupied;
    }

    /**
     * @param bool $isOccupied
     */
    public function setIsOccupied(bool $isOccupied): void
    {
        $this->isOccupied = $isOccupied;
    }

    /**
     * @return BusinessShoppingCenterId
     */
    public function getBusinessShoppingCenter(): BusinessShoppingCenterId
    {
        return $this->businessShoppingCenter;
    }

    /**
     * @param BusinessShoppingCenterId $businessShoppingCenter
     */
    public function setBusinessShoppingCenter(BusinessShoppingCenterId $businessShoppingCenter): void
    {
        $this->businessShoppingCenter = $businessShoppingCenter;
    }

    /**
     * @return Garage
     */
    public function getGarage(): Garage
    {
        return $this->garage;
    }

    /**
     * @param Garage $garage
     */
    public function setGarage(Garage $garage): void
    {
        $this->garage = $garage;
    }

    /**
     * @param $minArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateMinArea(
        $minArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        //Класс здания (только для видов объекта "Офисное помещение" и "Складское помещение")
        if (!is_null($minArea) && !in_array($object->getCategory(), [
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
                'Данное поле заполняется только для категорий:'
                . '"Офис", "Помещение свободного назначения", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    //Дописать
    /**
     * @param $conditionType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateConditionType(
        $conditionType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($conditionType) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Офис", "Помещение свободного назначения", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasInvestmentProject
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasInvestmentProject(
        $hasInvestmentProject,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasInvestmentProject) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $hasInvestmentProject
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasEncumbrances(
        $hasInvestmentProject,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasInvestmentProject) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $isOccupied
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateIsOccupied(
        $isOccupied,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($isOccupied) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Офис", "Помещение свободного назначения", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $businessShoppingCenter
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBusinessShoppingCenterId(
        $businessShoppingCenter,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($businessShoppingCenter) && !in_array($object->getCategory(), [
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
                'Данное поле заполняется только для категорий:'
                . '"Офис", "Помещение свободного назначения", "Торговая площадь"'
            )->addViolation();
        }
    }
}