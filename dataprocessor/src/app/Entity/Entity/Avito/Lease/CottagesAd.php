<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Lease;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\AbstractCottagesAd as BaseCottagesAd;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class CottagesAd
 * @package App\Entity\Avito\Lease
 */
class CottagesAd extends BaseCottagesAd
{
    use LeaseOperationType;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_COTTAGES;
    }
}
