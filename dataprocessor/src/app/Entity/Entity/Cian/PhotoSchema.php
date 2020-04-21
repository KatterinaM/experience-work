<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class PhotoSchema
 * @package App\Entity\Cian
 */
class PhotoSchema
{
    /**
     * @var Photos
     * @Serializer\SerializedName("PhotoSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Photos")
     * @Constraints\Valid()
     */
    private $photoSchema;

    /**
     * @return Photos
     */
    public function getPhotoSchema(): Photos
    {
        return $this->photoSchema;
    }

    /**
     * @param Photos $photoSchema
     */
    public function setPhotoSchema(Photos $photoSchema): void
    {
        $this->photoSchema = $photoSchema;
    }
}