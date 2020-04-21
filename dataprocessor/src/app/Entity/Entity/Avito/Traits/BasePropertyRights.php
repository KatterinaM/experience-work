<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait PropertyRights
 * @package App\Entity\Avito\Traits
 */
trait BasePropertyRights
{
    /**
     * @var string
     * @SerializedName("PropertyRights")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\BasePropertyRights", "validatePropertyRights" })
     */
    private $propertyRights;

    /**
     * Get available property rights
     * @return array<string>
     */
    abstract public function getAvailablePropertyRights(): array;

    /**
     * Get property rights
     * @return string|null
     */
    public function getPropertyRights(): ?string
    {
        return $this->propertyRights;
    }

    /**
     * Set property rights
     * @param string $propertyRights
     */
    public function setPropertyRights(string $propertyRights): void
    {
        $this->propertyRights = $propertyRights;
    }

    /**
     * @param mixed $propertyRights
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validatePropertyRights(
        $propertyRights,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        if (!in_array($propertyRights, $object->getAvailablePropertyRights())) {
            $context->buildViolation('Недопустимое значение: "' . $propertyRights . '"')
                ->addViolation();
        }
    }
}
