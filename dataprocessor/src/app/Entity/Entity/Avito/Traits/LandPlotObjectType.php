<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use Symfony\Component\Validator\Constraints;

/**
 * Trait LandPlotObjectType
 * @package App\Entity\Avito\Traits
 */
trait LandPlotObjectType
{
    use BaseObjectType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableObjectTypes(): array
    {
        return [
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_INDIVIDUAL,
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_AGRICULTURAL,
            ObjectTypeInterface::OBJECT_TYPE_LAND_PLOT_INDUSTRIAL,
        ];
    }
}
