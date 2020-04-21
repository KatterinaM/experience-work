<?php

namespace App\Entity\Cian\Base;

/**
 * Interface PlacementTypeInterface
 * @package App\Entity\Cian\Base
 */
interface PlacementTypeInterface
{
    const PLACEMENT_TYPE = [
        self::PLACEMENT_TYPE_SHOPPING_MALL,
        self::PLACEMENT_TYPE_STREET_RETAIL
    ];

    const PLACEMENT_TYPE_SHOPPING_MALL = "shoppingMall";
    const PLACEMENT_TYPE_STREET_RETAIL = "streetRetail";

    const PROPERTY_TYPE = [
        self::PROPERTY_TYPE_BUILDING,
        self::PROPERTY_TYPE_FREE_APPOINTMENT,
        self::PROPERTY_TYPE_GARAGE,
        self::PROPERTY_TYPE_INDUSTRY,
        self::PROPERTY_TYPE_LAND,
        self::PROPERTY_TYPE_OFFICE,
        self::PROPERTY_TYPE_SHOPPING_AREA,
        self::PROPERTY_TYPE_WAREHOUSE
    ];

    const PROPERTY_TYPE_BUILDING = "building";
    const PROPERTY_TYPE_FREE_APPOINTMENT = "freeAppointment";
    const PROPERTY_TYPE_GARAGE = "garage";
    const PROPERTY_TYPE_INDUSTRY = "industry";
    const PROPERTY_TYPE_LAND = "land";
    const PROPERTY_TYPE_OFFICE = "office";
    const PROPERTY_TYPE_SHOPPING_AREA = "shoppingArea";
    const PROPERTY_TYPE_WAREHOUSE = "warehouse";

    const PERMITTED_USE_TYPE = [
        self::PERMITTED_USE_TYPE_AGRICULTURAL,
        self::PERMITTED_USE_TYPE_BUSINESS_MANAGEMENT,
        self::PERMITTED_USE_TYPE_COMMON_USE_AREA,
        self::PERMITTED_USE_TYPE_HIGHRISE_BUILDINGS,
        self::PERMITTED_USE_TYPE_HOTEL_AMENITIES,
        self::PERMITTED_USE_TYPE_INDIVIDUAL_HOUSING_CONSTRUCTION,
        self::PERMITTED_USE_TYPE_INDUSTRY,
        self::PERMITTED_USE_TYPE_LEISURE,
        self::PERMITTED_USE_TYPE_LOWRISE_HOUSING,
        self::PERMITTED_USE_TYPE_PUBLIC_USE_OF_CAPITAL_CONSTRUCTION,
        self::PERMITTED_USE_TYPE_SERVICE_VEHICLES,
        self::PERMITTED_USE_TYPE_SHOPPING_CENTERS,
        self::PERMITTED_USE_TYPE_WAREHOUSES,
    ];

    const PERMITTED_USE_TYPE_AGRICULTURAL = "agricultural";
    const PERMITTED_USE_TYPE_BUSINESS_MANAGEMENT = "businessManagement";
    const PERMITTED_USE_TYPE_COMMON_USE_AREA = "commonUseArea";
    const PERMITTED_USE_TYPE_HIGHRISE_BUILDINGS = "highriseBuildings";
    const PERMITTED_USE_TYPE_HOTEL_AMENITIES = "hotelAmenities";
    const PERMITTED_USE_TYPE_INDIVIDUAL_HOUSING_CONSTRUCTION = "individualHousingConstruction";
    const PERMITTED_USE_TYPE_INDUSTRY = "industry";
    const PERMITTED_USE_TYPE_LEISURE = "leisure";
    const PERMITTED_USE_TYPE_LOWRISE_HOUSING = "lowriseHousing";
    const PERMITTED_USE_TYPE_PUBLIC_USE_OF_CAPITAL_CONSTRUCTION = "publicUseOfCapitalConstruction";
    const PERMITTED_USE_TYPE_SERVICE_VEHICLES = "serviceVehicles";
    const PERMITTED_USE_TYPE_SHOPPING_CENTERS = "shoppingCenters";
    const PERMITTED_USE_TYPE_WAREHOUSES = "warehouses";

}