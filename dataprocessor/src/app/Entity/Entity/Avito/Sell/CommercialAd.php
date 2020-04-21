<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Sell;

use App\Entity\Avito\Base\AbstractCommercialAd as BaseCommercialAd;
use App\Entity\Avito\Traits\SellOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class CommercialAd
 * @package App\Entity\Avito\Sell
 */
class CommercialAd extends BaseCommercialAd
{
    use SellOperationType;
}
