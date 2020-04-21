<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class CranageTypeSchema
 * @package App\Entity\Cian
 */
class CranageTypeSchema
{
    const CRANAGE_TYPE = [
        self::CRANAGE_TYPE_BEAM,
        self::CRANAGE_TYPE_GANTRY,
        self::CRANAGE_TYPE_OVERHEAD,
        self::CRANAGE_TYPE_RAILWAY,
    ];

    const CRANAGE_TYPE_BEAM = "beam";
    const CRANAGE_TYPE_GANTRY = "gantry";
    const CRANAGE_TYPE_OVERHEAD = "overhead";
    const CRANAGE_TYPE_RAILWAY = "railway";

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\CranageTypeSchema::CRANAGE_TYPE)
     * @Constraints\Valid()
     */
    private $cranageType;

    /**
     * @var int
     * @Serializer\SerializedName("Count")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $cranageCount;

    /**
     * @var int
     * @Serializer\SerializedName("LoadCapacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $cranageLoadCapacity;

    /**
     * @return string
     */
    public function getCranageType(): string
    {
        return $this->cranageType;
    }

    /**
     * @param string $cranageType
     */
    public function setCranageType(string $cranageType): void
    {
        $this->cranageType = $cranageType;
    }

    /**
     * @return int
     */
    public function getCranageCount(): int
    {
        return $this->cranageCount;
    }

    /**
     * @param int $cranageCount
     */
    public function setCranageCount(int $cranageCount): void
    {
        $this->cranageCount = $cranageCount;
    }

    /**
     * @return int
     */
    public function getCranageLoadCapacity(): int
    {
        return $this->cranageLoadCapacity;
    }

    /**
     * @param int $cranageLoadCapacity
     */
    public function setCranageLoadCapacity(int $cranageLoadCapacity): void
    {
        $this->cranageLoadCapacity = $cranageLoadCapacity;
    }
}