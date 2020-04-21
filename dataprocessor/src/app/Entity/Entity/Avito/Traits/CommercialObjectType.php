<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectTypeInterface;
use Symfony\Component\Validator\Constraints;

/**
 * Trait CommercialObjectType
 * @package App\Entity\Avito\Traits
 */
trait CommercialObjectType
{
    use BaseObjectType;

    /**
     * Get available object types
     * @return array<string>
     */
    public function getAvailableObjectTypes(): array
    {
        return [
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_HOTEL,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_OFFICE,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_CATERING_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_FREE_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_PRODUCTION_ROOM,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_WAREHOUSE_SPACE,
            ObjectTypeInterface::OBJECT_TYPE_COMMERCIAL_TRADE_ROOM,
        ];
    }
}
