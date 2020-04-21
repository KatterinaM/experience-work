<?php

namespace App\Entity\Avito;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;

/**
 * Class Image
 * @package App\Entity\Avito
 */
class Image
{
    /**
     * @var string
     * @SerializedName("url")
     * @XmlAttribute
     */
    public $url;
}
