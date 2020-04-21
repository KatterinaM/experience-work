<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait ShareAmount
 * @package App\Entity\Cian\Traits
 */
trait ShareAmount
{
    /**
     * @var string
     * @Serializer\SerializedName("ShareAmount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\ShareAmount", "validateShareAmount" })
     */
    private $shareAmount;

    /**
     * @return string
     */
    public function getShareAmount(): string
    {
        return $this->shareAmount;
    }

    /**
     * @param string $shareAmount
     */
    public function setShareAmount(string $shareAmount): void
    {
        $this->shareAmount = $shareAmount;
    }

    /**
     * @param $shareAmount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateShareAmount(
        $shareAmount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($shareAmount) && in_array($object->getCategory(), [
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
                ]))
            || (!is_null($shareAmount) && !in_array($object->getCategory(), [
                    CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE
                ]))
        ) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Часть дома", "Доля в квартире"'
            )->addViolation();
        }
    }
}