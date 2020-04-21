<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Videos
 * @package App\Entity\Cian
 */
class Videos
{
    /**
     * @var string
     * @Serializer\SerializedName("Url")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $videosUrl;

    /**
     * @return string
     */
    public function getVideosUrl(): string
    {
        return $this->videosUrl;
    }

    /**
     * @param string $videosUrl
     */
    public function setVideosUrl(string $videosUrl): void
    {
        $this->videosUrl = $videosUrl;
    }
}