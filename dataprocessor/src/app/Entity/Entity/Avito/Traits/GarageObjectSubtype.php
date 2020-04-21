<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\ObjectSubtypeInterface;
use App\Entity\Avito\Base\ObjectTypeInterface;

/**
 * Trait GarageObjectSubtype
 * @package App\Entity\Avito\Traits
 */
trait GarageObjectSubtype
{
    use BaseObjectSubtype;

    /**
     * @param string $objectType
     * @return array
     */
    public function getAvailableObjectSubtypes(string $objectType): array
    {
        switch ($objectType) {
            case ObjectTypeInterface::OBJECT_TYPE_GARAGE_BUILDING:
                return [
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_CONCRETE,
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_BRICK,
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_BUILDING_METAL,
                ];

            case ObjectTypeInterface::OBJECT_TYPE_GARAGE_SPACE:
                return [
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_MULTI_LEVEL,
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_UNDERGROUND,
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_CLOSED,
                    ObjectSubtypeInterface::OBJECT_SUBTYPE_GARAGE_SPACE_OPEN,
                ];
        }
        return [];
    }
}
