<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\PropertyRightsInterface;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Trait LandPlotObjectType
 * @package App\Entity\Avito\Traits
 */
trait StandardPropertyRights
{
    use BasePropertyRights;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailablePropertyRights(): array
    {
        return [
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
        ];
    }
}
