<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Sell;

use App\Entity\Avito\Base\AbstractCottagesAd as BaseCottagesAd;
use App\Entity\Avito\Traits\SellOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class CottagesAd
 * @package App\Entity\Avito\Sell
 */
class CottagesAd extends BaseCottagesAd
{
    use SellOperationType;
}
