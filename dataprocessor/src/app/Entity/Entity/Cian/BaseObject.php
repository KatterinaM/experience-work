<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use DateTime;
use Exception;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class BaseObject
 * @package App\Entity\Cian
 * @Serializer\XmlRoot("feed")
 */
class BaseObject
{
    /**
     * @var int
     * @Serializer\SerializedName("feed_version")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("int")
     */
    public $formatVersion = 2;


    /**
     * @var array<AbstractObject>
     * @Serializer\XmlList(inline = true, entry = "object")
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Cian\Base\AbstractObject")
     * })
     * @Constraints\Valid
     */
    public $objectList;


    /**
     * Object constructor.
     * @throws Exception
     */
    public function __construct()
    {

    }

}