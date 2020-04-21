<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\JCSchemaInfo;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait JCSchema
 * @package App\Entity\Avito\Traits
 * @XmlRoot("JCSchema")
 */
trait JCSchema
{
    /**
     * @var JCSchemaInfo
     * @Serializer\SerializedName("JCSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\JCSchemaInfo")
     * @Constraints\Valid()
     */
    private $jCSchema;

    /**
     * @return JCSchemaInfo
     */
    public function getJCSchema(): JCSchemaInfo
    {
        return $this->jCSchema;
    }

    /**
     * @param JCSchemaInfo $jCSchema
     */
    public function setJCSchema(JCSchemaInfo $jCSchema): void
    {
        $this->jCSchema = $jCSchema;
    }
}