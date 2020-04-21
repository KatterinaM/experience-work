<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class CranageTypes
 * @package App\Entity\Cian
 */
class CranageTypes
{
    /**
     * @var CranageTypeSchema
     * @Serializer\SerializedName("CranageTypeSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\CranageTypeSchema")
     * @Constraints\Valid()
     */
    private $cranageTypesSchema;

    /**
     * @return CranageTypeSchema
     */
    public function getCranageTypesSchema(): CranageTypeSchema
    {
        return $this->cranageTypesSchema;
    }

    /**
     * @param CranageTypeSchema $cranageTypesSchema
     */
    public function setCranageTypesSchema(CranageTypeSchema $cranageTypesSchema): void
    {
        $this->cranageTypesSchema = $cranageTypesSchema;
    }
}