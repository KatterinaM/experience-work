<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class SpecialtyTypes
 * @package App\Entity\Cian
 */
class SpecialtyTypes
{
    /**
     * @var string
     * @Serializer\SerializedName("String")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $typesString;

    /**
     * @return string
     */
    public function getTypesString(): string
    {
        return $this->typesString;
    }

    /**
     * @param string $typesString
     */
    public function setTypesString(string $typesString): void
    {
        $this->typesString = $typesString;
    }
}