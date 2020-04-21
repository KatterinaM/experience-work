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
trait BaseObjectSubtype
{
    /**
     * @var string
     * @SerializedName("ObjectSubtype")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\BaseObjectSubtype", "validateObjectSubtype" })
     */
    private $objectSubtype;

    /**
     * Get available object sub-types
     * @param string $objectType
     * @return array<string>
     */
    abstract public function getAvailableObjectSubtypes(string $objectType): array;

    /**
     * Get object sub-type
     * @return string|null
     */
    public function getObjectSubtype(): ?string
    {
        return $this->objectSubtype;
    }

    /**
     * Set object sub-type
     * @param string $objectSubtype
     */
    public function setObjectSubtype(string $objectSubtype): void
    {
        $this->objectSubtype = $objectSubtype;
    }

    /**
     * @param mixed $objectSubtype
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateObjectSubtype(
        $objectSubtype,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        $objectType = $object->getObjectType();
        if (!in_array($objectSubtype, $object->getAvailableObjectSubtypes($objectType))) {
            $context->buildViolation(
                'Invalid object sub-type [' . $objectSubtype . '] '
                .'of type [' . $objectType . '] '
                .'for class [' . get_class($object) . ']'
            )->addViolation();
        }

        // Должно присутствовать только в категории "Гаражи и машиноместа"
        if ($object->getCategory() == AbstractAd::CATEGORY_GARAGES) {
            $wrong = is_null($objectSubtype);
        } else {
            $wrong = !is_null($objectSubtype);
        }

        if ($wrong) {
            $context->buildViolation('Поле должно присутствовать только в категории "Гаражи и машиноместа"')
                ->addViolation();
        }
    }
}
