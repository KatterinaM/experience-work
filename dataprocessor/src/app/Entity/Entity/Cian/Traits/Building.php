<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\BuildingInfo;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Building
 * @package App\Entity\Cian\Traits
 * @XmlRoot("Building")
 */
trait Building
{
    /**
     * @var BuildingInfo
     * @Serializer\SerializedName("Building")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Traits\BuildingInfo")
     * @Constraints\Valid()
     */
    private $building;

    /**
     * @return BuildingInfo
     */
    public function getBuilding(): BuildingInfo
    {
        return $this->building;
    }

    /**
     * @param BuildingInfo $building
     */
    public function setBuilding(BuildingInfo $building): void
    {
        $this->building = $building;
    }
}