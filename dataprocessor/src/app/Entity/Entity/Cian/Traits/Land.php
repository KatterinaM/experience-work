<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\LandInfo;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Land
 * @package App\Entity\Cian\Traits
 * @XmlRoot("Land")
 */
trait Land
{
    /**
     * @var LandInfo
     * @Serializer\SerializedName("Land")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\LandInfo")
     * @Constraints\Valid()
     */
    private $land;

    /**
     * @return LandInfo
     */
    public function getLand(): LandInfo
    {
        return $this->land;
    }

    /**
     * @param LandInfo $land
     */
    public function setLand(LandInfo $land): void
    {
        $this->land = $land;
    }
}