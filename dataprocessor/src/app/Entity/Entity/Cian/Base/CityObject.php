<?php

namespace App\Entity\Cian\Base;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\CityCategoryType;
use App\Entity\Cian\Traits\JCSchema;
use App\Entity\Cian\Traits\ShareAmount;
use App\Entity\Cian\Traits\Room;
use App\Entity\Cian\Traits\ConditionsCityRealty;
use App\Entity\Cian\Traits\TermsLease;
use App\Entity\Cian\CplModeration;
use App\Entity\Cian\Traits\TotalArea;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class CityObject
 * @package App\Entity\Cian\Base
 */
class CityObject extends AbstractObject
{
    use CityCategoryType;
    use ShareAmount;
    use JCSchema;
    use AllInfrastructure;
    use Room;
    use ConditionsCityRealty;
    use TotalArea;
    use TermsLease;
    use BargainTerms;
    use Building;

    const DECORATION = [
        self::DECORATION_FINE,
        self::DECORATION_ROUGH,
        self::DECORATION_WITHOUT
    ];

    const DECORATION_FINE = "fine";
    const DECORATION_ROUGH = "rough";
    const DECORATION_WITHOUT = "without";

    /**
     * @var string
     * @Serializer\SerializedName("Decoration")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CityObject", "validateDecoration" })
     * @Constraints\Choice(choices = \App\Entity\Cian\Base\CityObject::DECORATION)
     */
    private $decoration;

    /**
     * @var bool
     * @Serializer\SerializedName("ProjectDeclarationUrl")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CityObject", "validateProjectDeclarationUrl" })
     * @Constraints\Type("bool")
     */
    private $projectDeclarationUrl;

    /**
     * @var CplModeration
     * @Serializer\SerializedName("CplModeration")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\CityObject", "validateCplModeration" })
     * @Constraints\Type("App\Entity\Cian\CplModeration")
     * @Constraints\Valid()
     */
    private $cplModeration;

    /**
     * @return string
     */
    public function getDecoration(): string
    {
        return $this->decoration;
    }

    /**
     * @param string $decoration
     */
    public function setDecoration(string $decoration): void
    {
        $this->decoration = $decoration;
    }

    /**
     * @return bool
     */
    public function isProjectDeclarationUrl(): bool
    {
        return $this->projectDeclarationUrl;
    }

    /**
     * @param bool $projectDeclarationUrl
     */
    public function setProjectDeclarationUrl(bool $projectDeclarationUrl): void
    {
        $this->projectDeclarationUrl = $projectDeclarationUrl;
    }

    /**
     * @return CplModeration
     */
    public function getCplModeration(): CplModeration
    {
        return $this->cplModeration;
    }

    /**
     * @param CplModeration $cplModeration
     */
    public function setCplModeration(CplModeration $cplModeration): void
    {
        $this->cplModeration = $cplModeration;
    }

    /**
     * @param $decoration
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDecoration(
        $decoration,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($decoration) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категории: "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $projectDeclarationUrl
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateProjectDeclarationUrl(
        $projectDeclarationUrl,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($projectDeclarationUrl) && !in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категорий:'
                . '"Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $cplModeration
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateCplModeration(
        $cplModeration,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (is_null($cplModeration) && in_array($object->getCategory(), [
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE
            ])) {
            $context->buildViolation(
                'Данное поле заполняется только для категории:'
                . '"Квартира в новостройке"'
            )->addViolation();
        }
    }
}