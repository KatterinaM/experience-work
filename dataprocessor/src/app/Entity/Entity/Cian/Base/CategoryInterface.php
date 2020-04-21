<?php


namespace App\Entity\Cian\Base;

/**
 * Interface CategoryInterface
 * @package App\Entity\Cian\Base
 */
interface CategoryInterface
{
    const CITY_CATEGORY_FLAT_RENT = 'flatRent';
    const CITY_CATEGORY_BED_RENT = 'bedRent';
    const CITY_CATEGORY_ROOM_RENT = 'roomRent';

    const CITY_CATEGORY_FLAT_SHARE_SALE = 'flatShareSale';
    const CITY_CATEGORY_FLAT_SALE = 'flatSale';
    const CITY_CATEGORY_NEW_BUILDING_FLAT_SALE = 'newBuildingFlatSale';
    const CITY_CATEGORY_ROOM_SALE = 'roomSale';

    const COUNTRY_CATEGORY_HOUSE_RENT = 'houseRent';
    const COUNTRY_CATEGORY_COTTAGE_RENT = 'cottageRent';
    const COUNTRY_CATEGORY_TOWNHOUSE_RENT = 'townhouseRent';
    const COUNTRY_CATEGORY_HOUSE_SHARE_RENT = 'houseShareRent';

    const COUNTRY_CATEGORY_HOUSE_SALE = 'houseSale';
    const COUNTRY_CATEGORY_COTTAGE_SALE = 'cottageSale';
    const COUNTRY_CATEGORY_TOWNHOUSE_SALE = 'townhouseSale';
    const COUNTRY_CATEGORY_LAND_SALE = 'landSale';
    const COUNTRY_CATEGORY_HOUSE_SHARE_SALE = 'houseShareSale';

    const COMMERCIAL_CATEGORY_GARAGE_RENT = 'garageRent';
    const COMMERCIAL_CATEGORY_BUSINESS_RENT = 'businessRent';
    const COMMERCIAL_CATEGORY_BUILDING_RENT = 'buildingRent';
    const COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT = 'commercialLandRent';
    const COMMERCIAL_CATEGORY_OFFICE_RENT = 'officeRent';
    const COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT = 'freeAppointmentObjectRent';
    const COMMERCIAL_CATEGORY_INDUSTRY_RENT = 'industryRent';
    const COMMERCIAL_CATEGORY_WAREHOUSE_RENT = 'warehouseRent';
    const COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT = 'shoppingAreaRent';

    const COMMERCIAL_CATEGORY_GARAGE_SALE = 'garageSale';
    const COMMERCIAL_CATEGORY_BUSINESS_SALE = 'businessSale';
    const COMMERCIAL_CATEGORY_BUILDING_SALE = 'buildingSale';
    const COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE = 'commercialLandSale';
    const COMMERCIAL_CATEGORY_OFFICE_SALE = 'officeSale';
    const COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE = 'freeAppointmentObjectSale';
    const COMMERCIAL_CATEGORY_INDUSTRY_SALE = 'industrySale';
    const COMMERCIAL_CATEGORY_WAREHOUSE_SALE = 'warehouseSale';
    const COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE = 'shoppingAreaSale';

}