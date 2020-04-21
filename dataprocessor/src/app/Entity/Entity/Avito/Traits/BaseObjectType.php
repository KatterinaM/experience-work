<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait ObjectType
 * @package App\Entity\Avito\Traits
 */
trait BaseObjectType
{
    /**
     * @var string
     * @SerializedName("ObjectType")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\BaseObjectType", "validateObjectType" })
     */
    private $objectType;

    /**
     * Get available object types
     * @return array<string>
     */
    abstract public function getAvailableObjectTypes(): array;

    /**
     * Get object type
     * @return string|null
     */
    public function getObjectType(): ?string
    {
        return $this->objectType;
    }

    /**
     * Set object type
     * @param string $objectType
     */
    public function setObjectType(string $objectType): void
    {
        $this->objectType = $objectType;
    }

    /**
     * @param mixed $objectType
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateObjectType(
        $objectType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        if (!in_array($objectType, $object->getAvailableObjectTypes())) {
            $context->buildViolation(
                'Invalid object type [' . $objectType . '] for class [' . get_class($object) . ']'
            )->addViolation();
        }

        /*
         * Обязательно в категориях:
         * - "Земельные участки"
         * - "Недвижимость за рубежом"
         * - "Коммерческая недвижимость"
         * - "Гаражи и машиноместа"
         * - "Дома, дачи, коттеджи"
         */
        if (is_null($objectType) && in_array($object->getCategory(), [
                AbstractAd::CATEGORY_LAND_PLOTS,
                AbstractAd::CATEGORY_FOREIGN,
                AbstractAd::CATEGORY_COMMERCIAL,
                AbstractAd::CATEGORY_GARAGES,
                AbstractAd::CATEGORY_COTTAGES,
        ])) {
            $context->buildViolation(
                'Поле обязательно в категориях: '
                . '"Земельные участки", '
                . '"Недвижимость за рубежом", '
                . '"Коммерческая недвижимость", '
                . '"Гаражи и машиноместа", '
                . '"Дома, дачи, коттеджи"'
            )->addViolation();
        }
    }
}
