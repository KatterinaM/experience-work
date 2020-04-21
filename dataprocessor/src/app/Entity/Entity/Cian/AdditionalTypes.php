<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class AdditionalTypes
 * @package App\Entity\Cian
 */
class AdditionalTypes
{
    /**
     * @var string
     * @Serializer\SerializedName("String")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $additionalTypesString;

    /**
     * @return string
     */
    public function getAdditionalTypesString(): string
    {
        return $this->additionalTypesString;
    }

    /**
     * @param string $additionalTypesString
     */
    public function setAdditionalTypesString(string $additionalTypesString): void
    {
        $this->additionalTypesString = $additionalTypesString;
    }
}