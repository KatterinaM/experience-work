<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class UndergroundInfoSchema
 * @package App\Entity\Cian
 */
class UndergroundInfoSchema
{
    /**
     * @var Undergrounds
     * @Serializer\SerializedName("UndergroundInfoSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Undergrounds")
     * @Constraints\Valid()
     */
    private $undergroundInfoSchema;

    /**
     * @return Undergrounds
     */
    public function getUndergroundInfoSchema(): Undergrounds
    {
        return $this->undergroundInfoSchema;
    }

    /**
     * @param Undergrounds $undergroundInfoSchema
     */
    public function setUndergroundInfoSchema(Undergrounds $undergroundInfoSchema): void
    {
        $this->undergroundInfoSchema = $undergroundInfoSchema;
    }
}