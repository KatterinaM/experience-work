<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Photos
 * @package App\Entity\Cian
 */
class Photos
{
    /**
     * @var string
     * @Serializer\SerializedName("FullUrl")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $photosFullUrl;

    /**
     * @var bool
     * @Serializer\SerializedName("IsDefault")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $photosIsDefault;

    /**
     * @return string
     */
    public function getPhotosFullUrl(): string
    {
        return $this->photosFullUrl;
    }

    /**
     * @param string $photosFullUrl
     */
    public function setPhotosFullUrl(string $photosFullUrl): void
    {
        $this->photosFullUrl = $photosFullUrl;
    }

    /**
     * @return bool
     */
    public function isPhotosIsDefault(): bool
    {
        return $this->photosIsDefault;
    }

    /**
     * @param bool $photosIsDefault
     */
    public function setPhotosIsDefault(bool $photosIsDefault): void
    {
        $this->photosIsDefault = $photosIsDefault;
    }
}