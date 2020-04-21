<?php


namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class LayoutPhoto
 * @package App\Entity\Cian
 */
class LayoutPhoto
{
    /**
     * @var string
     * @Serializer\SerializedName("FullUrl")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $layoutPhotoFullUrl;

    /**
     * @var bool
     * @Serializer\SerializedName("IsDefault")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $layoutPhotoIsDefault;

    /**
     * @return string
     */
    public function getLayoutPhotoFullUrl(): string
    {
        return $this->layoutPhotoFullUrl;
    }

    /**
     * @param string $layoutPhotoFullUrl
     */
    public function setLayoutPhotoFullUrl(string $layoutPhotoFullUrl): void
    {
        $this->layoutPhotoFullUrl = $layoutPhotoFullUrl;
    }

    /**
     * @return bool
     */
    public function isLayoutPhotoIsDefault(): bool
    {
        return $this->layoutPhotoIsDefault;
    }

    /**
     * @param bool $layoutPhotoIsDefault
     */
    public function setLayoutPhotoIsDefault(bool $layoutPhotoIsDefault): void
    {
        $this->layoutPhotoIsDefault = $layoutPhotoIsDefault;
    }
}