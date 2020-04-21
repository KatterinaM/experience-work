<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractLandPlotAd as BaseLandPlotAd;
use App\Entity\Avito\Traits\Address;
use App\Entity\Avito\Traits\DistanceToCity;
use App\Entity\Avito\Traits\LatLng;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class LandPlotAd
 * @package App\Entity\Avito\Lease
 */
final class LandPlotAd extends BaseLandPlotAd
{
    use LeaseOperationType;
}
