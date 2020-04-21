<?php

namespace App\Entity\Avito;

use App\Entity\Avito\Base\AbstractAd;
use DateTime;
use Exception;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use Symfony\Component\Validator\Constraints;

/**
 * Class Ads
 * @package App\Entity\Avito
 * @XmlRoot("Ads")
 */
class Ads
{
    /**
     * @var int
     * @SerializedName("formatVersion")
     * @XmlAttribute
     */
    public $formatVersion = 3;

    /**
     * @var string
     * @SerializedName("target")
     * @XmlAttribute
     */
    public $target = 'Avito.ru';

    /**
     * @var string
     * @SerializedName("generated")
     * @XmlAttribute
     */
    public $generated;

    /**
     * @var array<AbstractAd>
     * @XmlList(inline = true, entry = "Ad")
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Avito\Base\AbstractAd")
     * })
     * @Constraints\Valid
     */
    public $adList;

    /**
     * Ads constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->generated = new DateTime();
    }
}
