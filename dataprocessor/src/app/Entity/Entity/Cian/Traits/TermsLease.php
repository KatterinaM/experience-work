<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait TermsLease
 * @package App\Entity\Cian\Traits
 */
trait TermsLease
{
    /**
     * @var bool
     * @Serializer\SerializedName("PetsAllowed")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\TermsLease", "validatePetsAllowed" })
     * @Constraints\Type("bool")
     */
    private $petsAllowed;

    /**
     * @var bool
     * @Serializer\SerializedName("ChildrenAllowed")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Traits\TermsLease", "validateChildrenAllowed" })
     * @Constraints\Type("bool")
     */
    private $childrenAllowed;

    /**
     * @return bool
     */
    public function isPetsAllowed(): bool
    {
        return $this->petsAllowed;
    }

    /**
     * @param bool $petsAllowed
     */
    public function setPetsAllowed(bool $petsAllowed): void
    {
        $this->petsAllowed = $petsAllowed;
    }

    /**
     * @return bool
     */
    public function isChildrenAllowed(): bool
    {
        return $this->childrenAllowed;
    }

    /**
     * @param bool $childrenAllowed
     */
    public function setChildrenAllowed(bool $childrenAllowed): void
    {
        $this->childrenAllowed = $childrenAllowed;
    }

    /**
     * @param $petsAllowed
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePetsAllowed(
        $petsAllowed,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($petsAllowed) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для типов аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }

    /**
     * @param $childrenAllowed
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateChildrenAllowed(
        $childrenAllowed,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($childrenAllowed) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT
            ])) {
            $context->buildViolation(
                'Данное поле заполняется для типов аренда "Городской" и "Загородной" недвижимости'
            )->addViolation();
        }
    }
}