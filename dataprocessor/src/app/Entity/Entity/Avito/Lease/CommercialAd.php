<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractCommercialAd as BaseCommercialAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class CommercialAd
 * @package App\Entity\Avito\Lease
 */
class CommercialAd extends BaseCommercialAd
{
    use LeaseOperationType;
}
