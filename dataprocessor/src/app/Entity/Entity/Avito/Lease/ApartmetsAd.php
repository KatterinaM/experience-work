<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractApartmentsAd as BaseAppartmentsAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class AppartmetsAd
 * @package App\Entity\Avito\Lease
 */
class ApartmetsAd extends BaseAppartmentsAd
{
    use LeaseOperationType;
    use StandardPropertyRights;
}
