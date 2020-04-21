<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use Symfony\Component\Validator\Constraints;

/**
 * Trait LandPlotObjectType
 * @package App\Entity\Avito\Traits
 */
trait GarageObjectType
{
    use BaseObjectType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableObjectTypes(): array
    {
        return [
            ObjectTypeInterface::OBJECT_TYPE_GARAGE_BUILDING,
            ObjectTypeInterface::OBJECT_TYPE_GARAGE_SPACE,
        ];
    }
}
