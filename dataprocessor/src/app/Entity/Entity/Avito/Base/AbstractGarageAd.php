<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\GarageObjectSubtype;
use App\Entity\Avito\Traits\GarageObjectType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Secured;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class LandPlotAd
 * @package App\Entity\Avito\Base
 */
abstract class AbstractGarageAd extends AbstractAd
{
    use GarageObjectType;
    use GarageObjectSubtype;
    use StandardPropertyRights;
    use Location;
    use Secured;
    use Square;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_GARAGES;
    }
}
