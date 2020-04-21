<?php

namespace App\Entity\Avito\Traits;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Trait HouseType
 * @package App\Entity\Avito\Traits
 */
trait HouseType
{
    /**
     * @var string
     * @SerializedName("HouseType")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     * @Constraints\Choice(choices = \App\Entity\Avito\Base\HouseTypeInterface::AVAILABLE_TYPES)
     */
    private $houseType;

    /**
     * @return string
     */
    public function getHouseType(): string
    {
        return $this->houseType;
    }

    /**
     * @param string $houseType
     */
    public function setHouseType(string $houseType): void
    {
        $this->houseType = $houseType;
    }
}
