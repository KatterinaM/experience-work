<?php

namespace App\Entity\Publication\API;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class Publication
 * @package App\Entity\Publication\API
 */
class Publication
{
    /**
     * @var int
     * @Type("int")
     */
    public $id;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("managers_id")
     */
    public $managersId;

    /**
     * @var string
     * @Type("string")
     */
    public $name;

    /**
     * @var bool
     * @Type("bool")
     */
    public $active;

    /**
     * @var string
     * @Type("string")
     */
    public $description;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("concept_id")
     */
    public $conceptId;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("liter")
     */
    public $literId;

    /**
     * @var int
     * @Type("int")
     * @SerializedName("object")
     */
    public $objectId;

    /**
     * @var Polygon[]
     * @Type("array<App\Entity\Publication\API\Polygon>")
     * @SerializedName("polys")
     */
    public $polygons;

    /**
     * @var int[]
     * @Type("array<int>")
     */
    public $hashtag;

    /**
     * @var Hashtag[]
     * @Type("array<App\Entity\Publication\API\Hashtag>")
     * @SerializedName("hashtag_value")
     */
    public $hashtagValue;
}
