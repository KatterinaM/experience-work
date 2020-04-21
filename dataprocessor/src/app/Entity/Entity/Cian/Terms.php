<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Terms
 * @package App\Entity\Cian
 */
class Terms
{
    /**
     * @var PublishTermSchema
     * @Serializer\SerializedName("Terms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\PublishTermSchema")
     * @Constraints\Valid()
     */
    private $terms;

    /**
     * @return PublishTermSchema
     */
    public function getTerms(): PublishTermSchema
    {
        return $this->terms;
    }

    /**
     * @param PublishTermSchema $terms
     */
    public function setTerms(PublishTermSchema $terms): void
    {
        $this->terms = $terms;
    }
}