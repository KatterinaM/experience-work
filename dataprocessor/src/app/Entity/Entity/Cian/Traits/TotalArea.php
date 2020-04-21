<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait TotalArea
 * @package App\Entity\Cian\Traits
 */
trait TotalArea
{
    /**
     * @var double
     * @Serializer\SerializedName("TotalArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\TotalArea", "validateTotalArea" })
     */
    private $totalArea;

    /**
     * @return float
     */
    public function getTotalArea(): float
    {
        return $this->totalArea;
    }

    /**
     * @param float $totalArea
     */
    public function setTotalArea(float $totalArea): void
    {
        $this->totalArea = $totalArea;
    }

    /**
     * @param $totalArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateTotalArea(
        $totalArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (is_null($totalArea) && !in_array($object->getCategory(), [
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
            ])) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий: "Здание", "Коммерчиская земля", "Участок" для отсальных обязательно'
            )->addViolation();
        }
    }
}