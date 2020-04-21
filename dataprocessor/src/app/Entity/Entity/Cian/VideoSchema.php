<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class VideoSchema
 * @package App\Entity\Cian
 */
class VideoSchema
{
    /**
     * @var Videos
     * @Serializer\SerializedName("VideoSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Videos")
     * @Constraints\Valid()
     */
    private $videoSchema;

    /**
     * @return Videos
     */
    public function getVideoSchema(): Videos
    {
        return $this->videoSchema;
    }

    /**
     * @param Videos $videoSchema
     */
    public function setVideoSchema(Videos $videoSchema): void
    {
        $this->videoSchema = $videoSchema;
    }
}