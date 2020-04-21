<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait LandArea
 * @package App\Entity\Avito\Traits
 */
trait LandArea
{
    /**
     * @var int
     * @SerializedName("LandArea")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\LandArea", "validateLandArea" })
     */
    private $landArea;

    /**
     * @return int
     */
    public function getLandArea(): int
    {
        return $this->landArea;
    }

    /**
     * @param int $landArea
     */
    public function setLandArea(int $landArea): void
    {
        $this->landArea = $landArea;
    }

    /**
     * @param mixed $landArea
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateLandArea(
        $landArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Обязательно в категориях "Дома, дачи, коттеджи" и "Земельные участки"
        if (is_null($landArea) && in_array($object->getCategory(), [
                AbstractAd::CATEGORY_LAND_PLOTS,
                AbstractAd::CATEGORY_COTTAGES,
            ])) {
            $context->buildViolation('Поле обязательно в категориях "Дома, дачи, коттеджи" и "Земельные участки"')
                ->addViolation();
        }
    }
}
