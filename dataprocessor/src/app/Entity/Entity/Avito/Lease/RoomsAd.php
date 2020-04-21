<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractRoomsAd as BaseRoomsAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class RoomsAd
 * @package App\Entity\Avito\Lease
 */
class RoomsAd extends BaseRoomsAd
{
    use LeaseOperationType;
}
