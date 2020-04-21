<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use Symfony\Component\Validator\Constraints;

/**
 * Trait LandPlotObjectType
 * @package App\Entity\Avito\Traits
 */
trait ForeignObjectType
{
    use BaseObjectType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableObjectTypes(): array
    {
        return [
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_APPARTMENT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_HOUSE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_LAND_PLOT,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_GARAGE,
            ObjectTypeInterface::OBJECT_TYPE_FOREIGN_COMMERCIAL,
        ];
    }
}
