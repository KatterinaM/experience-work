<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Specialty
 * @package App\Entity\Cian
 */
class Specialty
{
    /**
     * @var SpecialtyTypes
     * @Serializer\SerializedName("Types")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\SpecialtyTypes")
     */
    private $specialtyTypes;

    /**
     * @var AdditionalTypes
     * @Serializer\SerializedName("AdditionalTypes")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\AdditionalTypes")
     */
    private $additionalTypes;

    /**
     * @return SpecialtyTypes
     */
    public function getSpecialtyTypes(): SpecialtyTypes
    {
        return $this->specialtyTypes;
    }

    /**
     * @param SpecialtyTypes $specialtyTypes
     */
    public function setSpecialtyTypes(SpecialtyTypes $specialtyTypes): void
    {
        $this->specialtyTypes = $specialtyTypes;
    }

    /**
     * @return AdditionalTypes
     */
    public function getAdditionalTypes(): AdditionalTypes
    {
        return $this->additionalTypes;
    }

    /**
     * @param AdditionalTypes $additionalTypes
     */
    public function setAdditionalTypes(AdditionalTypes $additionalTypes): void
    {
        $this->additionalTypes = $additionalTypes;
    }
}