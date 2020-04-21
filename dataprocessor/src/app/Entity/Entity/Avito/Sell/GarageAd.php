<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Sell;

use App\Entity\Avito\Base\AbstractGarageAd as BaseGarageAd;
use App\Entity\Avito\Traits\Address;
use App\Entity\Avito\Traits\DistanceToCity;
use App\Entity\Avito\Traits\LatLng;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\SellOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class LandPlotAd
 * @package App\Entity\Avito\Lease
 */
final class GarageAd extends BaseGarageAd
{
    use SellOperationType;
}
