<?php

namespace App\Entity\Publication\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class Hashtag
 * @package App\Entity\Publication\API
 */
class Hashtag
{
    /**
     * @var int
     * @Type("int")
     */
    public $id;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("tag")
     */
    public $tagId;

    /**
     * @var string
     * @Type("string")
     */
    public $value;
}
