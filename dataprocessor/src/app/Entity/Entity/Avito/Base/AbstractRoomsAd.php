<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\HouseType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Rooms;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Class AbstractRoomsAd
 * @package App\Entity\Avito\Base\
 */
class AbstractRoomsAd extends AbstractAd
{
    use StandardPropertyRights;
    use Location;
    use Rooms;
    use Square;
    use Floors;
    use HouseType;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_ROOMS;
    }
}
