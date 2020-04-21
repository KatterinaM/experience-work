<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\LandArea;
use App\Entity\Avito\Traits\LandPlotObjectType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class LandPlotAd
 * @package App\Entity\Avito\Base
 */
abstract class AbstractLandPlotAd extends AbstractAd
{
    use LandPlotObjectType;
    use StandardPropertyRights;
    use Location;
    use LandArea;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_LAND_PLOTS;
    }
}
