<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Base\CategoryInterface;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class BuildingInfo
 * @package App\Entity\Cian
 */
class BuildingInfo
{
    const MATERIAL_TYPE = [
        self::MATERIAL_TYPE_AEROCRETE_BLOCK,
        self::MATERIAL_TYPE_BLOCK,
        self::MATERIAL_TYPE_BOARDS,
        self::MATERIAL_TYPE_BRICK,
        self::MATERIAL_TYPE_FOAM_CONCRETE_BLOCK,
        self::MATERIAL_TYPE_GAS_SILICATE_BLOCK,
        self::MATERIAL_TYPE_MONOLITH,
        self::MATERIAL_TYPE_MONOLITH_BRICK,
        self::MATERIAL_TYPE_OLD,
        self::MATERIAL_TYPE_PANEL,
        self::MATERIAL_TYPE_STALIN,
        self::MATERIAL_TYPE_WIREFRAME,
        self::MATERIAL_TYPE_WOOD
    ];

    const MATERIAL_TYPE_AEROCRETE_BLOCK = "aerocreteBlock";
    const MATERIAL_TYPE_BLOCK = "block";
    const MATERIAL_TYPE_BOARDS = "boards";
    const MATERIAL_TYPE_BRICK = "brick";
    const MATERIAL_TYPE_FOAM_CONCRETE_BLOCK = "foamConcreteBlock";
    const MATERIAL_TYPE_GAS_SILICATE_BLOCK = "gasSilicateBlock";
    const MATERIAL_TYPE_MONOLITH = "monolith";
    const MATERIAL_TYPE_MONOLITH_BRICK = "monolithBrick";
    const MATERIAL_TYPE_OLD = "old";
    const MATERIAL_TYPE_PANEL = "panel";
    const MATERIAL_TYPE_STALIN = "stalin";
    const MATERIAL_TYPE_WIREFRAME = "wireframe";
    const MATERIAL_TYPE_WOOD = "wood";

    const HEATING_TYPE = [
        self::HEATING_TYPE_AUTONOMOUS_GAS,
        self::HEATING_TYPE_AUTONOMOUS,
        self::HEATING_TYPE_CENTRAL_COAL,
        self::HEATING_TYPE_CENTRAL_GAS,
        self::HEATING_TYPE_CENTRAL,
        self::HEATING_TYPE_DIESEL,
        self::HEATING_TYPE_ELECTRIC,
        self::HEATING_TYPE_FIREPLACE,
        self::HEATING_TYPE_NO,
        self::HEATING_TYPE_SOLID_FUEL_BOILER,
        self::HEATING_TYPE_BOILER,
        self::HEATING_TYPE_OTHER,
        self::HEATING_TYPE_SOLID_FUEL_STOVE
    ];

    const HEATING_TYPE_AUTONOMOUS_GAS = "autonomousGas";
    const HEATING_TYPE_AUTONOMOUS = "autonomous";
    const HEATING_TYPE_CENTRAL_COAL = "centralCoal";
    const HEATING_TYPE_CENTRAL_GAS = "centralGas";
    const HEATING_TYPE_CENTRAL = "central";
    const HEATING_TYPE_DIESEL = "diesel";
    const HEATING_TYPE_ELECTRIC = "electric";
    const HEATING_TYPE_FIREPLACE = "fireplace";
    const HEATING_TYPE_NO = "no";
    const HEATING_TYPE_SOLID_FUEL_BOILER = "solidFuelBoiler";
    const HEATING_TYPE_BOILER = "boiler";
    const HEATING_TYPE_OTHER = "other";
    const HEATING_TYPE_SOLID_FUEL_STOVE = "stove";

    const BUILDING_TYPE = [
        self::BUILDING_TYPE_ADMINISTRATIVE_BUILDING,
        self::BUILDING_TYPE_BUSINESS_CENTER,
        self::BUILDING_TYPE_BUSINESS_PARK,
        self::BUILDING_TYPE_BUSINESS_QUARTER,
        self::BUILDING_TYPE_BUSINESS_QUARTER2,
        self::BUILDING_TYPE_FREE,
        self::BUILDING_TYPE_INDUSTRIAL_COMPLEX,
        self::BUILDING_TYPE_INDUSTRIAL_PARK,
        self::BUILDING_TYPE_INDUSTRIAL_SITE,
        self::BUILDING_TYPE_INDUSTRIAL_WAREHOUSE_COMPLEX,
        self::BUILDING_TYPE_LOGISTICS_COMPLEX,
        self::BUILDING_TYPE_LOGISTICS_PARK,
        self::BUILDING_TYPE_MANSION,
        self::BUILDING_TYPE_MANUFACTURE_BUILDING,
        self::BUILDING_TYPE_MANUFACTURING_FACILITY,
        self::BUILDING_TYPE_MODULAR,
        self::BUILDING_TYPE_MULTIFUNCTIONAL_COMPLEX,
        self::BUILDING_TYPE_OFFICE_AND_HOTEL_COMPLEX,
        self::BUILDING_TYPE_OFFICE_AND_RESIDENTIAL_COMPLEX,
        self::BUILDING_TYPE_OFFICE_AND_WAREHOUSE,
        self::BUILDING_TYPE_OFFICE_AND_WAREHOUSE_COMPLEX,
        self::BUILDING_TYPE_OFFICE_BUILDING,
        self::BUILDING_TYPE_OFFICE_CENTER,
        self::BUILDING_TYPE_OFFICE_COMPLEX,
        self::BUILDING_TYPE_OFFICE_INDUSTRIAL_COMPLEX,
        self::BUILDING_TYPE_OFFICE_QUARTER,
        self::BUILDING_TYPE_OLD,
        self::BUILDING_TYPE_OTHER,
        self::BUILDING_TYPE_OUTLET,
        self::BUILDING_TYPE_PROPERTY_COMPLEX,
        self::BUILDING_TYPE_RESIDENTIAL_COMPLEX,
        self::BUILDING_TYPE_RESIDENTIAL_HOUSE,
        self::BUILDING_TYPE_SHOPPING_AND_BUSINESS_COMPLEX,
        self::BUILDING_TYPE_SHOPPING_AND_COMMUNITY_CENTER,
        self::BUILDING_TYPE_SHOPPING_AND_ENTERTAINMENT_CENTER,
        self::BUILDING_TYPE_SHOPPING_AND_WAREHOUSE_COMPLEX,
        self::BUILDING_TYPE_SHOPPING_CENTER,
        self::BUILDING_TYPE_SHOPPING_COMPLEX,
        self::BUILDING_TYPE_SPECIALIZED_SHOPPING_CENTER,
        self::BUILDING_TYPE_STANDALONE_BUILDING,
        self::BUILDING_TYPE_TECHNOPARK,
        self::BUILDING_TYPE_TRADE_AND_EXHIBITION_COMPLEX,
        self::BUILDING_TYPE_TRADING_HOUSE,
        self::BUILDING_TYPE_TRADING_OFFICE_COMPLEX,
        self::BUILDING_TYPE_WAREHOUSE,
        self::BUILDING_TYPE_WAREHOUSE_COMPLEX,
    ];

    const BUILDING_TYPE_ADMINISTRATIVE_BUILDING = "administrativeBuilding";
    const BUILDING_TYPE_BUSINESS_CENTER = "businessCenter";
    const BUILDING_TYPE_BUSINESS_PARK = "businessPark";
    const BUILDING_TYPE_BUSINESS_QUARTER = "businessQuarter";
    const BUILDING_TYPE_BUSINESS_QUARTER2 = "businessQuarter2";
    const BUILDING_TYPE_FREE = "free";
    const BUILDING_TYPE_INDUSTRIAL_COMPLEX = "industrialComplex";
    const BUILDING_TYPE_INDUSTRIAL_PARK = "industrialPark";
    const BUILDING_TYPE_INDUSTRIAL_SITE = "industrialSite";
    const BUILDING_TYPE_INDUSTRIAL_WAREHOUSE_COMPLEX = "industrialWarehouseComplex";
    const BUILDING_TYPE_LOGISTICS_COMPLEX = "logisticsComplex";
    const BUILDING_TYPE_LOGISTICS_PARK = "logisticsPark";
    const BUILDING_TYPE_MANSION = "mansion";
    const BUILDING_TYPE_MANUFACTURE_BUILDING = "manufactureBuilding";
    const BUILDING_TYPE_MANUFACTURING_FACILITY = "manufacturingFacility";
    const BUILDING_TYPE_MODULAR = "modular";
    const BUILDING_TYPE_MULTIFUNCTIONAL_COMPLEX = "multifunctionalComplex";
    const BUILDING_TYPE_OFFICE_AND_HOTEL_COMPLEX = "officeAndHotelComplex";
    const BUILDING_TYPE_OFFICE_AND_RESIDENTIAL_COMPLEX = "officeAndResidentialComplex";
    const BUILDING_TYPE_OFFICE_AND_WAREHOUSE = "officeAndWarehouse";
    const BUILDING_TYPE_OFFICE_AND_WAREHOUSE_COMPLEX = "officeAndWarehouseComplex";
    const BUILDING_TYPE_OFFICE_BUILDING = "officeBuilding";
    const BUILDING_TYPE_OFFICE_CENTER = "officeCenter";
    const BUILDING_TYPE_OFFICE_COMPLEX = "officeComplex";
    const BUILDING_TYPE_OFFICE_INDUSTRIAL_COMPLEX = "officeIndustrialComplex";
    const BUILDING_TYPE_OFFICE_QUARTER = "officeQuarter";
    const BUILDING_TYPE_OLD = "old";
    const BUILDING_TYPE_OTHER = "other";
    const BUILDING_TYPE_OUTLET = "outlet";
    const BUILDING_TYPE_PROPERTY_COMPLEX = "propertyComplex";
    const BUILDING_TYPE_RESIDENTIAL_COMPLEX = "residentialComplex";
    const BUILDING_TYPE_RESIDENTIAL_HOUSE = "residentialHouse";
    const BUILDING_TYPE_SHOPPING_AND_BUSINESS_COMPLEX = "shoppingAndBusinessComplex";
    const BUILDING_TYPE_SHOPPING_AND_COMMUNITY_CENTER = "shoppingAndCommunityCenter";
    const BUILDING_TYPE_SHOPPING_AND_ENTERTAINMENT_CENTER = "shoppingAndEntertainmentCenter";
    const BUILDING_TYPE_SHOPPING_AND_WAREHOUSE_COMPLEX = "shoppingAndWarehouseComplex";
    const BUILDING_TYPE_SHOPPING_CENTER = "shoppingCenter";
    const BUILDING_TYPE_SHOPPING_COMPLEX = "shoppingComplex";
    const BUILDING_TYPE_SPECIALIZED_SHOPPING_CENTER = "specializedShoppingCenter";
    const BUILDING_TYPE_STANDALONE_BUILDING = "standaloneBuilding";
    const BUILDING_TYPE_TECHNOPARK = "technopark";
    const BUILDING_TYPE_TRADE_AND_EXHIBITION_COMPLEX = "tradeAndExhibitionComplex";
    const BUILDING_TYPE_TRADING_HOUSE = "tradingHouse";
    const BUILDING_TYPE_TRADING_OFFICE_COMPLEX = "tradingOfficeComplex";
    const BUILDING_TYPE_WAREHOUSE = "warehouse";
    const BUILDING_TYPE_WAREHOUSE_COMPLEX = "warehouseComplex";

    const HOUSE_LINE_TYPE = [
        self::HOUSE_LINE_TYPE_FIRST,
        self::HOUSE_LINE_TYPE_SECOND,
        self::HOUSE_LINE_TYPE_OTHER
    ];

    const HOUSE_LINE_TYPE_FIRST = "first";
    const HOUSE_LINE_TYPE_SECOND = "second";
    const HOUSE_LINE_TYPE_OTHER = "other";

    const CLASS_TYPE = [
        self::CLASS_TYPE_A,
        self::CLASS_TYPE_A_PLUS,
        self::CLASS_TYPE_B,
        self::CLASS_TYPE_B_MINUS,
        self::CLASS_TYPE_B_PLUS,
        self::CLASS_TYPE_C
    ];

    const CLASS_TYPE_A = "a";
    const CLASS_TYPE_A_PLUS = "aPlus";
    const CLASS_TYPE_B = "b";
    const CLASS_TYPE_B_MINUS = "bMinus";
    const CLASS_TYPE_B_PLUS = "bPlus";
    const CLASS_TYPE_C = "c";

    const VENTILATION_TYPE = [
        self::VENTILATION_TYPE_FORCED,
        self::VENTILATION_TYPE_NATURAL,
        self::VENTILATION_TYPE_NO,
    ];

    const VENTILATION_TYPE_FORCED = "forced";
    const VENTILATION_TYPE_NATURAL = "natural";
    const VENTILATION_TYPE_NO = "no";

    const CONDITIONING_TYPE = [
        self::CONDITIONING_TYPE_CENTRAL,
        self::CONDITIONING_TYPE_LOCAL,
        self::CONDITIONING_TYPE_NO,
    ];

    const CONDITIONING_TYPE_CENTRAL = "central";
    const CONDITIONING_TYPE_LOCAL = "local";
    const CONDITIONING_TYPE_NO = "no";

    const EXTINGUISHING_SYSTEM_TYPE = [
        self::EXTINGUISHING_SYSTEM_TYPE_ALARM,
        self::EXTINGUISHING_SYSTEM_TYPE_GAS,
        self::EXTINGUISHING_SYSTEM_TYPE_HYDRANT,
        self::EXTINGUISHING_SYSTEM_TYPE_NO,
        self::EXTINGUISHING_SYSTEM_TYPE_POWDER,
        self::EXTINGUISHING_SYSTEM_TYPE_SPRINKLER
    ];

    const EXTINGUISHING_SYSTEM_TYPE_ALARM = "alarm";
    const EXTINGUISHING_SYSTEM_TYPE_GAS = "gas";
    const EXTINGUISHING_SYSTEM_TYPE_HYDRANT = "hydrant";
    const EXTINGUISHING_SYSTEM_TYPE_NO = "no";
    const EXTINGUISHING_SYSTEM_TYPE_POWDER = "powder";
    const EXTINGUISHING_SYSTEM_TYPE_SPRINKLER = "sprinkler";

    const STATUS_TYPE = [
        self::STATUS_TYPE_OPERATIONAL,
        self::STATUS_TYPE_PROJECT,
        self::STATUS_TYPE_UNDER_CONSTRUCTION
    ];

    const STATUS_TYPE_OPERATIONAL = "operational";
    const STATUS_TYPE_PROJECT = "project";
    const STATUS_TYPE_UNDER_CONSTRUCTION = "underConstruction";

    const ACCESS_TYPE = [
        self::ACCESS_TYPE_FREE,
        self::ACCESS_TYPE_PASS_SYSTEM
    ];

    const ACCESS_TYPE_FREE = "free";
    const ACCESS_TYPE_PASS_SYSTEM = "passSystem";

    const GATES_TYPE = [
        self::GATES_TYPE_AT_ZERO,
        self::GATES_TYPE_DOCK_TYPE,
        self::GATES_TYPE_ON_RAMP,
    ];

    const GATES_TYPE_AT_ZERO = "atZero";
    const GATES_TYPE_DOCK_TYPE = "dockType";
    const GATES_TYPE_ON_RAMP = "onRamp";

    const SHOPPING_CENTER_SCALE_TYPE = [
        self::SHOPPING_CENTER_SCALE_TYPE_DISTRICT,
        self::SHOPPING_CENTER_SCALE_TYPE_MICRODISTRICT,
        self::SHOPPING_CENTER_SCALE_TYPE_OKRUG,
        self::SHOPPING_CENTER_SCALE_TYPE_REGIONAL,
        self::SHOPPING_CENTER_SCALE_TYPE_SUPER_OKRUG,
        self::SHOPPING_CENTER_SCALE_TYPE_SUPER_REGIONAL
    ];

    const SHOPPING_CENTER_SCALE_TYPE_DISTRICT = "district";
    const SHOPPING_CENTER_SCALE_TYPE_MICRODISTRICT = "microdistrict";
    const SHOPPING_CENTER_SCALE_TYPE_OKRUG = "okrug";
    const SHOPPING_CENTER_SCALE_TYPE_REGIONAL = "regional";
    const SHOPPING_CENTER_SCALE_TYPE_SUPER_OKRUG = "superOkrug";
    const SHOPPING_CENTER_SCALE_TYPE_SUPER_REGIONAL = "superRegional";

    const WORKING_DAYS_TYPE = [
        self::WORKING_DAYS_TYPE_EVERYDAY,
        self::WORKING_DAYS_TYPE_WEEKDAYS,
        self::WORKING_DAYS_TYPE_WEEKENDS
    ];

    const WORKING_DAYS_TYPE_EVERYDAY = "everyday";
    const WORKING_DAYS_TYPE_WEEKDAYS = "weekdays";
    const WORKING_DAYS_TYPE_WEEKENDS = "weekends";

    /**
     * @var string
     * @Serializer\SerializedName("Name")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateName" })
     */
    private $buildingName;

    /**
     * @var int
     * @Serializer\SerializedName("FloorsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateFloorsCount" })
     */
    private $floorsCount;

    /**
     * @var int
     * @Serializer\SerializedName("BuildYear")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateBuildYear" })
     */
    private $buildYear;

    /**
     * @var string
     * @Serializer\SerializedName("MaterialType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateMaterialType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::MATERIAL_TYPE)
     * @Constraints\Valid()
     */
    private $materialType;

    /**
     * @var string
     * @Serializer\SerializedName("Series")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateSeries" })
     */
    private $series;

    /**
     * @var double
     * @Serializer\SerializedName("CeilingHeight")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateCeilingHeight" })
     */
    private $ceilingHeight;

    /**
     * @var int
     * @Serializer\SerializedName("PassengerLiftsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validatePassengerLiftsCount" })
     */
    private $passengerLiftsCount;

    /**
     * @var int
     * @Serializer\SerializedName("CargoLiftsCount")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateCargoLiftsCount" })
     */
    private $cargoLiftsCount;

    /**
     * @var bool
     * @Serializer\SerializedName("HasGarbageChute")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateHasGarbageChute" })
     * @Constraints\Type("bool")
     */
    private $hasGarbageChute;

    /**
     * @var Parking
     * @Serializer\SerializedName("Parking")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Parking")
     * @Constraints\Valid()
     */
    private $parking;

    /**
     * @var string
     * @Serializer\SerializedName("HeatingType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateHeatingType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::HEATING_TYPE)
     * @Constraints\Valid()
     */
    private $heatingType;

    /**
     * @var Infrastructure
     * @Serializer\SerializedName("Infrastructure")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Infrastructure")
     * @Constraints\Valid()
     */
    private $infrastructure;

    /**
     * @var double
     * @Serializer\SerializedName("TotalArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateBuildingTotalArea" })
     */
    private $buildingTotalArea;

    /**
     * @var string
     * @Serializer\SerializedName("Type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateBuildingType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::BUILDING_TYPE)
     * @Constraints\Valid()
     */
    private $buildingType;

    /**
     * @var string
     * @Serializer\SerializedName("HouseLineType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateHouseLineType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::HOUSE_LINE_TYPE)
     * @Constraints\Valid()
     */
    private $houseLineType;

    /**
     * @var string
     * @Serializer\SerializedName("ClassType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateClassType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::CLASS_TYPE)
     * @Constraints\Valid()
     */
    private $classType;

    /**
     * @var string
     * @Serializer\SerializedName("Developer")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateDeveloper" })
     */
    private $developer;

    /**
     * @var string
     * @Serializer\SerializedName("ManagementCompany")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateManagementCompany" })
     */
    private $managementCompany;

    /**
     * @var string
     * @Serializer\SerializedName("VentilationType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateVentilationType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::VENTILATION_TYPE)
     * @Constraints\Valid()
     */
    private $ventilationType;

    /**
     * @var string
     * @Serializer\SerializedName("ConditioningType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateConditioningType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::CONDITIONING_TYPE)
     * @Constraints\Valid()
     */
    private $conditioningType;

    /**
     * @var string
     * @Serializer\SerializedName("ExtinguishingSystemType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateExtinguishingSystemType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::EXTINGUISHING_SYSTEM_TYPE)
     * @Constraints\Valid()
     */
    private $extinguishingSystemType;


    /**
     * @var LiftTypes
     * @Serializer\SerializedName("LiftTypes")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\LiftTypes")
     * @Constraints\Valid()
     */
    private $liftTypes;

    /**
     * @var string
     * @Serializer\SerializedName("StatusType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateStatusType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::STATUS_TYPE)
     * @Constraints\Valid()
     */
    private $statusType;

    /**
     * @var string
     * @Serializer\SerializedName("AccessType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateAccessType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::ACCESS_TYPE)
     * @Constraints\Valid()
     */
    private $accessType;

    /**
     * @var CranageTypes
     * @Serializer\SerializedName("CranageTypes")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateCranageTypes" })
     * @Constraints\Type("App\Entity\Cian\CranageTypes")
     * @Constraints\Valid()
     */
    private $cranageTypes;

    /**
     * @var string
     * @Serializer\SerializedName("GatesType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateGatesType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::GATES_TYPE)
     * @Constraints\Valid()
     */
    private $gatesType;

    /**
     * @var string
     * @Serializer\SerializedName("ColumnGrid")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateColumnGrid" })
     */
    private $columnGrid;

    /**
     * @var string
     * @Serializer\SerializedName("ShoppingCenterScaleType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateShoppingCenterScaleType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::SHOPPING_CENTER_SCALE_TYPE)
     * @Constraints\Valid()
     */
    private $shoppingCenterScaleType;

    /**
     * @var string
     * @Serializer\SerializedName("WorkingDaysType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateWorkingDaysType" })
     * @Constraints\Choice(choices = \App\Entity\Cian\BuildingInfo::WORKING_DAYS_TYPE)
     * @Constraints\Valid()
     */
    private $workingDaysType;

    /**
     * @var string
     * @Serializer\SerializedName("Tenants")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateTenants" })
     */
    private $tenants;

    /**
     * @var OpeningHours
     * @Serializer\SerializedName("OpeningHours")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\BuildingInfo", "validateOpeningHours" })
     * @Constraints\Type("App\Entity\Cian\OpeningHours")
     * @Constraints\Valid()
     */
    private $openingHours;

    /**
     * @return string
     */
    public function getBuildingName(): string
    {
        return $this->buildingName;
    }

    /**
     * @param string $buildingName
     */
    public function setBuildingName(string $buildingName): void
    {
        $this->buildingName = $buildingName;
    }

    /**
     * @return int
     */
    public function getFloorsCount(): int
    {
        return $this->floorsCount;
    }

    /**
     * @param int $floorsCount
     */
    public function setFloorsCount(int $floorsCount): void
    {
        $this->floorsCount = $floorsCount;
    }

    /**
     * @return int
     */
    public function getBuildYear(): int
    {
        return $this->buildYear;
    }

    /**
     * @param int $buildYear
     */
    public function setBuildYear(int $buildYear): void
    {
        $this->buildYear = $buildYear;
    }

    /**
     * @return string
     */
    public function getMaterialType(): string
    {
        return $this->materialType;
    }

    /**
     * @param string $materialType
     */
    public function setMaterialType(string $materialType): void
    {
        $this->materialType = $materialType;
    }

    /**
     * @return string
     */
    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries(string $series): void
    {
        $this->series = $series;
    }

    /**
     * @return float
     */
    public function getCeilingHeight(): float
    {
        return $this->ceilingHeight;
    }

    /**
     * @param float $ceilingHeight
     */
    public function setCeilingHeight(float $ceilingHeight): void
    {
        $this->ceilingHeight = $ceilingHeight;
    }

    /**
     * @return int
     */
    public function getPassengerLiftsCount(): int
    {
        return $this->passengerLiftsCount;
    }

    /**
     * @param int $passengerLiftsCount
     */
    public function setPassengerLiftsCount(int $passengerLiftsCount): void
    {
        $this->passengerLiftsCount = $passengerLiftsCount;
    }

    /**
     * @return int
     */
    public function getCargoLiftsCount(): int
    {
        return $this->cargoLiftsCount;
    }

    /**
     * @param int $cargoLiftsCount
     */
    public function setCargoLiftsCount(int $cargoLiftsCount): void
    {
        $this->cargoLiftsCount = $cargoLiftsCount;
    }

    /**
     * @return bool
     */
    public function isHasGarbageChute(): bool
    {
        return $this->hasGarbageChute;
    }

    /**
     * @param bool $hasGarbageChute
     */
    public function setHasGarbageChute(bool $hasGarbageChute): void
    {
        $this->hasGarbageChute = $hasGarbageChute;
    }

    /**
     * @return Parking
     */
    public function getParking(): Parking
    {
        return $this->parking;
    }

    /**
     * @param Parking $parking
     */
    public function setParking(Parking $parking): void
    {
        $this->parking = $parking;
    }

    /**
     * @return string
     */
    public function getHeatingType(): string
    {
        return $this->heatingType;
    }

    /**
     * @param string $heatingType
     */
    public function setHeatingType(string $heatingType): void
    {
        $this->heatingType = $heatingType;
    }

    /**
     * @return Infrastructure
     */
    public function getInfrastructure(): Infrastructure
    {
        return $this->infrastructure;
    }

    /**
     * @param Infrastructure $infrastructure
     */
    public function setInfrastructure(Infrastructure $infrastructure): void
    {
        $this->infrastructure = $infrastructure;
    }

    /**
     * @return float
     */
    public function getBuildingTotalArea(): float
    {
        return $this->buildingTotalArea;
    }

    /**
     * @param float $buildingTotalArea
     */
    public function setBuildingTotalArea(float $buildingTotalArea): void
    {
        $this->buildingTotalArea = $buildingTotalArea;
    }

    /**
     * @return string
     */
    public function getBuildingType(): string
    {
        return $this->buildingType;
    }

    /**
     * @param string $buildingType
     */
    public function setBuildingType(string $buildingType): void
    {
        $this->buildingType = $buildingType;
    }

    /**
     * @return string
     */
    public function getHouseLineType(): string
    {
        return $this->houseLineType;
    }

    /**
     * @param string $houseLineType
     */
    public function setHouseLineType(string $houseLineType): void
    {
        $this->houseLineType = $houseLineType;
    }

    /**
     * @return string
     */
    public function getClassType(): string
    {
        return $this->classType;
    }

    /**
     * @param string $classType
     */
    public function setClassType(string $classType): void
    {
        $this->classType = $classType;
    }

    /**
     * @return string
     */
    public function getDeveloper(): string
    {
        return $this->developer;
    }

    /**
     * @param string $developer
     */
    public function setDeveloper(string $developer): void
    {
        $this->developer = $developer;
    }

    /**
     * @return string
     */
    public function getManagementCompany(): string
    {
        return $this->managementCompany;
    }

    /**
     * @param string $managementCompany
     */
    public function setManagementCompany(string $managementCompany): void
    {
        $this->managementCompany = $managementCompany;
    }

    /**
     * @return string
     */
    public function getVentilationType(): string
    {
        return $this->ventilationType;
    }

    /**
     * @param string $ventilationType
     */
    public function setVentilationType(string $ventilationType): void
    {
        $this->ventilationType = $ventilationType;
    }

    /**
     * @return string
     */
    public function getConditioningType(): string
    {
        return $this->conditioningType;
    }

    /**
     * @param string $conditioningType
     */
    public function setConditioningType(string $conditioningType): void
    {
        $this->conditioningType = $conditioningType;
    }

    /**
     * @return string
     */
    public function getExtinguishingSystemType(): string
    {
        return $this->extinguishingSystemType;
    }

    /**
     * @param string $extinguishingSystemType
     */
    public function setExtinguishingSystemType(string $extinguishingSystemType): void
    {
        $this->extinguishingSystemType = $extinguishingSystemType;
    }

    /**
     * @return LiftTypes
     */
    public function getLiftTypes(): LiftTypes
    {
        return $this->liftTypes;
    }

    /**
     * @param LiftTypes $liftTypes
     */
    public function setLiftTypes(LiftTypes $liftTypes): void
    {
        $this->liftTypes = $liftTypes;
    }

    /**
     * @return string
     */
    public function getStatusType(): string
    {
        return $this->statusType;
    }

    /**
     * @param string $statusType
     */
    public function setStatusType(string $statusType): void
    {
        $this->statusType = $statusType;
    }

    /**
     * @return string
     */
    public function getAccessType(): string
    {
        return $this->accessType;
    }

    /**
     * @param string $accessType
     */
    public function setAccessType(string $accessType): void
    {
        $this->accessType = $accessType;
    }

    /**
     * @return CranageTypes
     */
    public function getCranageTypes(): CranageTypes
    {
        return $this->cranageTypes;
    }

    /**
     * @param CranageTypes $cranageTypes
     */
    public function setCranageTypes(CranageTypes $cranageTypes): void
    {
        $this->cranageTypes = $cranageTypes;
    }

    /**
     * @return string
     */
    public function getGatesType(): string
    {
        return $this->gatesType;
    }

    /**
     * @param string $gatesType
     */
    public function setGatesType(string $gatesType): void
    {
        $this->gatesType = $gatesType;
    }

    /**
     * @return string
     */
    public function getColumnGrid(): string
    {
        return $this->columnGrid;
    }

    /**
     * @param string $columnGrid
     */
    public function setColumnGrid(string $columnGrid): void
    {
        $this->columnGrid = $columnGrid;
    }

    /**
     * @return string
     */
    public function getShoppingCenterScaleType(): string
    {
        return $this->shoppingCenterScaleType;
    }

    /**
     * @param string $shoppingCenterScaleType
     */
    public function setShoppingCenterScaleType(string $shoppingCenterScaleType): void
    {
        $this->shoppingCenterScaleType = $shoppingCenterScaleType;
    }

    /**
     * @return string
     */
    public function getWorkingDaysType(): string
    {
        return $this->workingDaysType;
    }

    /**
     * @param string $workingDaysType
     */
    public function setWorkingDaysType(string $workingDaysType): void
    {
        $this->workingDaysType = $workingDaysType;
    }

    /**
     * @return string
     */
    public function getTenants(): string
    {
        return $this->tenants;
    }

    /**
     * @param string $tenants
     */
    public function setTenants(string $tenants): void
    {
        $this->tenants = $tenants;
    }

    /**
     * @return OpeningHours
     */
    public function getOpeningHours(): OpeningHours
    {
        return $this->openingHours;
    }

    /**
     * @param OpeningHours $openingHours
     */
    public function setOpeningHours(OpeningHours $openingHours): void
    {
        $this->openingHours = $openingHours;
    }

    /**
     * @param $buildingName
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateName(
        $buildingName,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($buildingName) && in_array($object->getCategory(), array(
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для типа "Загородная" недвижимость и категорий "Коммерческая земля" продажа,
                 "Готовый бизнес", "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $floorsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateFloorsCount(
        $floorsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($floorsCount) && in_array($object->getCategory(), array(
                    CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                    CategoryInterface::CITY_CATEGORY_BED_RENT,
                    CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                    CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                    CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
                ))) || (!is_null($floorsCount) && !in_array($object->getCategory(), array(
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                    CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                    CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                    CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                    CategoryInterface::CITY_CATEGORY_BED_RENT,
                    CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                    CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                    CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                    CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
                )))) {
            $context->buildViolation(
                'Данное поле заполняется для типа "Городская" недвижимость и категорий "Готовый бизнес", "Здание",
                 "Офис", "Помещение свободного назначения", "Производство", "Склад", "Торговая площадь", "Дом/дача",
                 "Коттедж", "Таунхаус", "Часть дома" продажа'
            )->addViolation();
        }
    }

    /**
     * @param $buildYear
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBuildYear(
        $buildYear,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($buildYear) && in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUSINESS_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Гараж", "Готовый бизнес", "Здание", "Коммерческая земля", 
                "Помещение свободного назначения", "Торговая площадь" продажа, "Доля в квартире", "Квартира в новостройке"
                "Участок", "Часть дома"'
            )->addViolation();
        }
    }

    /**
     * @param $materialType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateMaterialType(
        $materialType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($materialType) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа "Городская" недвижимость и категорий "Дом/дача", "Коттедж", 
                "Таунхаус", "Часть дома" продажа, "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $series
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateSeries(
        $series,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($series) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для типа "Городская" недвижимость, кроме категории "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $ceilingHeight
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateCeilingHeight(
        $ceilingHeight,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($ceilingHeight) && in_array($object->getCategory(), array(
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,

                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_LAND_SALE,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_COMMERCIAL_LAND_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для типа "Загородная" недвижимость и категорий "Гараж", "Коммерческая земля"'
            )->addViolation();
        }
    }

    /**
     * @param $passengerLiftsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validatePassengerLiftsCount(
        $passengerLiftsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($passengerLiftsCount) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа "Городская" недвижимость'
            )->addViolation();
        }
    }

    /**
     * @param $cargoLiftsCount
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateCargoLiftsCount(
        $cargoLiftsCount,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($cargoLiftsCount) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_NEW_BUILDING_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа "Городская" недвижимость'
            )->addViolation();
        }
    }

    /**
     * @param $hasGarbageChute
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasGarbageChute(
        $hasGarbageChute,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasGarbageChute) && !in_array($object->getCategory(), array(
                CategoryInterface::CITY_CATEGORY_FLAT_RENT,
                CategoryInterface::CITY_CATEGORY_BED_RENT,
                CategoryInterface::CITY_CATEGORY_ROOM_RENT,
                CategoryInterface::CITY_CATEGORY_FLAT_SHARE_SALE,
                CategoryInterface::CITY_CATEGORY_FLAT_SALE,
                CategoryInterface::CITY_CATEGORY_ROOM_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для типа "Городская" недвижимость, кроме категории "Квартира в новостройке"'
            )->addViolation();
        }
    }

    /**
     * @param $heatingType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHeatingType(
        $heatingType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($heatingType) && !in_array($object->getCategory(), array(
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SHARE_RENT,
                CategoryInterface::COUNTRY_CATEGORY_HOUSE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_COTTAGE_SALE,
                CategoryInterface::COUNTRY_CATEGORY_TOWNHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для типа "Загородная" недвижимость и категорий "Здание", "Офис", "Помещение свободного назначения",
                "Производство", "Склад", "Торговая площадь", "Дом/дача", "Коттедж", "Таунхаус"'
            )->addViolation();
        }
    }

    /**
     * @param $buildingTotalArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBuildingTotalArea(
    $buildingTotalArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if ((is_null($buildingTotalArea) && in_array($object->getCategory(), array(
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                ))) || (!is_null($buildingTotalArea) && !in_array($object->getCategory(), array(
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                    CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                )))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения",
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $buildingType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateBuildingType(
        $buildingType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($buildingType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $houseLineType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHouseLineType(
        $houseLineType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($houseLineType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $classType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateClassType(
        $classType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($classType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $developer
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateDeveloper(
        $developer,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($developer) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $managementCompany
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateManagementCompany(
        $managementCompany,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($managementCompany) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $ventilationType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateVentilationType(
        $ventilationType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($ventilationType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $conditioningType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateConditioningType(
        $conditioningType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($conditioningType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $extinguishingSystemType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateExtinguishingSystemType(
        $extinguishingSystemType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($extinguishingSystemType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $statusType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateStatusType(
        $statusType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($statusType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_BUILDING_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_FREE_APPOINTMENT_OBJECT_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Здание", "Офис", "Помещение свободного назначения", 
                "Торговая площадь", "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $accessType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateAccessType(
        $accessType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($accessType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $cranageTypes
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateCranageTypes(
        $cranageTypes,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($cranageTypes) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $gatesType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateGatesType(
        $gatesType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($gatesType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $columnGrid
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateColumnGrid(
        $columnGrid,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($columnGrid) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $shoppingCenterScaleType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateShoppingCenterScaleType(
        $shoppingCenterScaleType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($shoppingCenterScaleType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $workingDaysType
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateWorkingDaysType(
        $workingDaysType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($workingDaysType) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $tenants
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateTenants(
        $tenants,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($tenants) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $openingHours
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateOpeningHours(
        $openingHours,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($openingHours) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле не заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }
}