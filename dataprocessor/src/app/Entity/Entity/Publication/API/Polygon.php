<?php

namespace App\Entity\Publication\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class Polygon
 * @package App\Entity\Publication\API
 */
class Polygon
{
    /**
     * @var int
     * @Type("int")
     */
    public $id;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("publication")
     */
    public $publicationId;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("cflor")
     */
    public $cflor;

    /**
     * @var string
     * @Type("string")
     * @SerializedName("polys")
     */
    public $polygons;
}
