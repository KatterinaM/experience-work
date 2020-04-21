<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class PublishTermSchema
 * @package App\Entity\Cian\Traits
 */
class PublishTermSchema
{
    /**
     * @var PublishTerms
     * @Serializer\SerializedName("PublishTermSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\PublishTerms")
     * @Constraints\Valid()
     */
    private $publishTermSchema;

    /**
     * @return PublishTerms
     */
    public function getPublishTermSchema(): PublishTerms
    {
        return $this->publishTermSchema;
    }

    /**
     * @param PublishTerms $publishTermSchema
     */
    public function setPublishTermSchema(PublishTerms $publishTermSchema): void
    {
        $this->publishTermSchema = $publishTermSchema;
    }
}