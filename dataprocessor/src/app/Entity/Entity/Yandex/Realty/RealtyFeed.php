<?php

namespace App\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Base\AbstractOffer;
use DateTime;
use Exception;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class RealtyFeed
 * @package App\Entity\Yandex\Realty
 * @Serializer\XmlRoot("realty-feed")
 */
class RealtyFeed
{
    /**
     * @var string
     * @Serializer\XmlAttribute()
     */
    public $xmlns = 'http://webmaster.yandex.ru/schemas/feed/realty/2010-06';

    /**
     * @var DateTime
     * @Serializer\SerializedName("generation-date")
     * @Serializer\Type("DateTime")
     * @Serializer\XmlElement(cdata=false)
     */
    public $generationDate;

    /**
     * @var array<AbstractOffer>
     * @Serializer\XmlList(inline = true, entry = "offer")
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Yandex\Realty\Base\AbstractOffer")
     * })
     * @Constraints\Valid()
     */
    public $offerList;

    /**
     * RealtyFeed constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->generationDate = new DateTime();
    }
}
