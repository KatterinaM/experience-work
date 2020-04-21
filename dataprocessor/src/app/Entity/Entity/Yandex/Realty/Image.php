<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Image
 * @package App\Entity\Yandex\Realty
 */
class Image
{
    /**
     * @var string
     * @Serializer\SerializedName("url")
     * @Serializer\XmlValue(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Url()
     */
    private $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
