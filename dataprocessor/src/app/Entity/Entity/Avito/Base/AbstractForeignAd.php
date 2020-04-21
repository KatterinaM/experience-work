<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\ForeignObjectType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\StandardPropertyRights;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Class LandPlotAd
 * @package App\Entity\Avito\Base
 */
abstract class AbstractForeignAd extends AbstractAd
{
    use ForeignObjectType;
    use StandardPropertyRights;
    use Location;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_FOREIGN;
    }
}
