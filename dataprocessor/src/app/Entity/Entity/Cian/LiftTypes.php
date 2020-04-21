<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class LiftTypes
 * @package App\Entity\Cian
 */
class LiftTypes
{
    /**
     * @var LiftTypeSchema
     * @Serializer\SerializedName("LiftTypeSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\LiftTypeSchema")
     * @Constraints\Valid()
     */
    private $liftTypesSchema;

    /**
     * @return LiftTypeSchema
     */
    public function getLiftTypesSchema(): LiftTypeSchema
    {
        return $this->liftTypesSchema;
    }

    /**
     * @param LiftTypeSchema $liftTypesSchema
     */
    public function setLiftTypesSchema(LiftTypeSchema $liftTypesSchema): void
    {
        $this->liftTypesSchema = $liftTypesSchema;
    }
}