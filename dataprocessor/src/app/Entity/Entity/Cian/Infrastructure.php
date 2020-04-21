<?php

namespace App\Entity\Cian;

use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\AbstractObject;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Infrastructure
 * @package App\Entity\Cian
 */
class Infrastructure
{
    /**
     * @var bool
     * @Serializer\SerializedName("HasCarWash")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasCarWash" })
     */
    private $hasCarWash;

    /**
     * @var bool
     * @Serializer\SerializedName("HasCarService")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasCarService" })
     */
    private $hasCarService;

    /**
     * @var bool
     * @Serializer\SerializedName("HasTire")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasTire" })
     */
    private $hasTire;

    /**
     * @var bool
     * @Serializer\SerializedName("HasInspectionPit")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasInspectionPit" })
     */
    private $hasInspectionPit;

    /**
     * @var bool
     * @Serializer\SerializedName("HasVideoSurveillance")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasVideoSurveillance" })
     */
    private $hasVideoSurveillance;

    /**
     * @var bool
     * @Serializer\SerializedName("HasHourSecurity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasHourSecurity" })
     */
    private $hasHourSecurity;

    /**
     * @var bool
     * @Serializer\SerializedName("HasAutomaticGates")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasAutomaticGates" })
     */
    private $hasAutomaticGates;

    /**
     * @var bool
     * @Serializer\SerializedName("HasEntryByPass")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasEntryByPass" })
     */
    private $hasEntryByPass;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBasement")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBasement" })
     */
    private $hasBasement;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBuffet")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBuffet" })
     */
    private $hasBuffet;

    /**
     * @var bool
     * @Serializer\SerializedName("HasCanteen")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasCanteen" })
     */
    private $hasCanteen;

    /**
     * @var bool
     * @Serializer\SerializedName("HasCentralReception")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasCentralReception" })
     */
    private $hasCentralReception;

    /**
     * @var bool
     * @Serializer\SerializedName("HasHotel")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasHotel" })
     */
    private $hasHotel;

    /**
     * @var bool
     * @Serializer\SerializedName("HasOfficeSpace")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasOfficeSpace" })
     */
    private $hasOfficeSpace;

    /**
     * @var bool
     * @Serializer\SerializedName("HasAtm")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasAtm" })
     */
    private $hasAtm;

    /**
     * @var bool
     * @Serializer\SerializedName("HasExhibitionAndWarehouseComplex")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasExhibitionAndWarehouseComplex" })
     */
    private $hasExhibitionAndWarehouseComplex;

    /**
     * @var bool
     * @Serializer\SerializedName("HasPharmacy")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasPharmacy" })
     */
    private $hasPharmacy;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBankDepartment")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBankDepartment" })
     */
    private $hasBankDepartment;

    /**
     * @var bool
     * @Serializer\SerializedName("HasCafe")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasCafe" })
     */
    private $hasCafe;

    /**
     * @var bool
     * @Serializer\SerializedName("HasMedicalCenter")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasMedicalCenter" })
     */
    private $hasMedicalCenter;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBeautyShop")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBeautyShop" })
     */
    private $hasBeautyShop;

    /**
     * @var bool
     * @Serializer\SerializedName("HasStudio")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasStudio" })
     */
    private $hasStudio;

    /**
     * @var bool
     * @Serializer\SerializedName("HasNotaryOffice")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasNotaryOffice" })
     */
    private $hasNotaryOffice;

    /**
     * @var bool
     * @Serializer\SerializedName("HasPool")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasPool" })
     */
    private $hasPool;

    /**
     * @var bool
     * @Serializer\SerializedName("HasClothesStudio")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasClothesStudio" })
     */
    private $hasClothesStudio;

    /**
     * @var bool
     * @Serializer\SerializedName("HasWarehouse")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasWarehouse" })
     */
    private $hasWarehouse;

    /**
     * @var bool
     * @Serializer\SerializedName("HasPark")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasPark" })
     */
    private $hasPark;

    /**
     * @var bool
     * @Serializer\SerializedName("HasRestaurant")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasRestaurant" })
     */
    private $hasRestaurant;

    /**
     * @var bool
     * @Serializer\SerializedName("HasFitnessCentre")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasFitnessCentre" })
     */
    private $hasFitnessCentre;

    /**
     * @var bool
     * @Serializer\SerializedName("HasSupermarket")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasSupermarket" })
     */
    private $hasSupermarket;

    /**
     * @var bool
     * @Serializer\SerializedName("HasMinimarket")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasMinimarket" })
     */
    private $hasMinimarket;

    /**
     * @var bool
     * @Serializer\SerializedName("HasShoppingArea")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasShoppingArea" })
     */
    private $hasShoppingArea;

    /**
     * @var bool
     * @Serializer\SerializedName("HasConferenceRoom")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasConferenceRoom" })
     */
    private $hasConferenceRoom;

    /**
     * @var bool
     * @Serializer\SerializedName("HasFoodCourt")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasFoodCourt" })
     */
    private $hasFoodCourt;

    /**
     * @var bool
     * @Serializer\SerializedName("HasSlotMachines")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasSlotMachines" })
     */
    private $hasSlotMachines;

    /**
     * @var bool
     * @Serializer\SerializedName("HasAquapark")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasAquapark" })
     */
    private $hasAquapark;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBabySitting")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBabySitting" })
     */
    private $hasBabySitting;

    /**
     * @var bool
     * @Serializer\SerializedName("HasRink")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasRink" })
     */
    private $hasRink;

    /**
     * @var bool
     * @Serializer\SerializedName("HasBowling")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasBowling" })
     */
    private $hasBowling;

    /**
     * @var bool
     * @Serializer\SerializedName("HasGameRoom")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Infrastructure", "validateHasGameRoom" })
     */
    private $hasGameRoom;

    /**
     * @return bool
     */
    public function isHasCarWash(): bool
    {
        return $this->hasCarWash;
    }

    /**
     * @param bool $hasCarWash
     */
    public function setHasCarWash(bool $hasCarWash): void
    {
        $this->hasCarWash = $hasCarWash;
    }

    /**
     * @return bool
     */
    public function isHasCarService(): bool
    {
        return $this->hasCarService;
    }

    /**
     * @param bool $hasCarService
     */
    public function setHasCarService(bool $hasCarService): void
    {
        $this->hasCarService = $hasCarService;
    }

    /**
     * @return bool
     */
    public function isHasTire(): bool
    {
        return $this->hasTire;
    }

    /**
     * @param bool $hasTire
     */
    public function setHasTire(bool $hasTire): void
    {
        $this->hasTire = $hasTire;
    }

    /**
     * @return bool
     */
    public function isHasInspectionPit(): bool
    {
        return $this->hasInspectionPit;
    }

    /**
     * @param bool $hasInspectionPit
     */
    public function setHasInspectionPit(bool $hasInspectionPit): void
    {
        $this->hasInspectionPit = $hasInspectionPit;
    }

    /**
     * @return bool
     */
    public function isHasVideoSurveillance(): bool
    {
        return $this->hasVideoSurveillance;
    }

    /**
     * @param bool $hasVideoSurveillance
     */
    public function setHasVideoSurveillance(bool $hasVideoSurveillance): void
    {
        $this->hasVideoSurveillance = $hasVideoSurveillance;
    }

    /**
     * @return bool
     */
    public function isHasHourSecurity(): bool
    {
        return $this->hasHourSecurity;
    }

    /**
     * @param bool $hasHourSecurity
     */
    public function setHasHourSecurity(bool $hasHourSecurity): void
    {
        $this->hasHourSecurity = $hasHourSecurity;
    }

    /**
     * @return bool
     */
    public function isHasAutomaticGates(): bool
    {
        return $this->hasAutomaticGates;
    }

    /**
     * @param bool $hasAutomaticGates
     */
    public function setHasAutomaticGates(bool $hasAutomaticGates): void
    {
        $this->hasAutomaticGates = $hasAutomaticGates;
    }

    /**
     * @return bool
     */
    public function isHasEntryByPass(): bool
    {
        return $this->hasEntryByPass;
    }

    /**
     * @param bool $hasEntryByPass
     */
    public function setHasEntryByPass(bool $hasEntryByPass): void
    {
        $this->hasEntryByPass = $hasEntryByPass;
    }

    /**
     * @return bool
     */
    public function isHasBasement(): bool
    {
        return $this->hasBasement;
    }

    /**
     * @param bool $hasBasement
     */
    public function setHasBasement(bool $hasBasement): void
    {
        $this->hasBasement = $hasBasement;
    }

    /**
     * @return bool
     */
    public function isHasBuffet(): bool
    {
        return $this->hasBuffet;
    }

    /**
     * @param bool $hasBuffet
     */
    public function setHasBuffet(bool $hasBuffet): void
    {
        $this->hasBuffet = $hasBuffet;
    }

    /**
     * @return bool
     */
    public function isHasCanteen(): bool
    {
        return $this->hasCanteen;
    }

    /**
     * @param bool $hasCanteen
     */
    public function setHasCanteen(bool $hasCanteen): void
    {
        $this->hasCanteen = $hasCanteen;
    }

    /**
     * @return bool
     */
    public function isHasCentralReception(): bool
    {
        return $this->hasCentralReception;
    }

    /**
     * @param bool $hasCentralReception
     */
    public function setHasCentralReception(bool $hasCentralReception): void
    {
        $this->hasCentralReception = $hasCentralReception;
    }

    /**
     * @return bool
     */
    public function isHasHotel(): bool
    {
        return $this->hasHotel;
    }

    /**
     * @param bool $hasHotel
     */
    public function setHasHotel(bool $hasHotel): void
    {
        $this->hasHotel = $hasHotel;
    }

    /**
     * @return bool
     */
    public function isHasOfficeSpace(): bool
    {
        return $this->hasOfficeSpace;
    }

    /**
     * @param bool $hasOfficeSpace
     */
    public function setHasOfficeSpace(bool $hasOfficeSpace): void
    {
        $this->hasOfficeSpace = $hasOfficeSpace;
    }

    /**
     * @return bool
     */
    public function isHasAtm(): bool
    {
        return $this->hasAtm;
    }

    /**
     * @param bool $hasAtm
     */
    public function setHasAtm(bool $hasAtm): void
    {
        $this->hasAtm = $hasAtm;
    }

    /**
     * @return bool
     */
    public function isHasExhibitionAndWarehouseComplex(): bool
    {
        return $this->hasExhibitionAndWarehouseComplex;
    }

    /**
     * @param bool $hasExhibitionAndWarehouseComplex
     */
    public function setHasExhibitionAndWarehouseComplex(bool $hasExhibitionAndWarehouseComplex): void
    {
        $this->hasExhibitionAndWarehouseComplex = $hasExhibitionAndWarehouseComplex;
    }

    /**
     * @return bool
     */
    public function isHasPharmacy(): bool
    {
        return $this->hasPharmacy;
    }

    /**
     * @param bool $hasPharmacy
     */
    public function setHasPharmacy(bool $hasPharmacy): void
    {
        $this->hasPharmacy = $hasPharmacy;
    }

    /**
     * @return bool
     */
    public function isHasBankDepartment(): bool
    {
        return $this->hasBankDepartment;
    }

    /**
     * @param bool $hasBankDepartment
     */
    public function setHasBankDepartment(bool $hasBankDepartment): void
    {
        $this->hasBankDepartment = $hasBankDepartment;
    }

    /**
     * @return bool
     */
    public function isHasCafe(): bool
    {
        return $this->hasCafe;
    }

    /**
     * @param bool $hasCafe
     */
    public function setHasCafe(bool $hasCafe): void
    {
        $this->hasCafe = $hasCafe;
    }

    /**
     * @return bool
     */
    public function isHasMedicalCenter(): bool
    {
        return $this->hasMedicalCenter;
    }

    /**
     * @param bool $hasMedicalCenter
     */
    public function setHasMedicalCenter(bool $hasMedicalCenter): void
    {
        $this->hasMedicalCenter = $hasMedicalCenter;
    }

    /**
     * @return bool
     */
    public function isHasBeautyShop(): bool
    {
        return $this->hasBeautyShop;
    }

    /**
     * @param bool $hasBeautyShop
     */
    public function setHasBeautyShop(bool $hasBeautyShop): void
    {
        $this->hasBeautyShop = $hasBeautyShop;
    }

    /**
     * @return bool
     */
    public function isHasStudio(): bool
    {
        return $this->hasStudio;
    }

    /**
     * @param bool $hasStudio
     */
    public function setHasStudio(bool $hasStudio): void
    {
        $this->hasStudio = $hasStudio;
    }

    /**
     * @return bool
     */
    public function isHasNotaryOffice(): bool
    {
        return $this->hasNotaryOffice;
    }

    /**
     * @param bool $hasNotaryOffice
     */
    public function setHasNotaryOffice(bool $hasNotaryOffice): void
    {
        $this->hasNotaryOffice = $hasNotaryOffice;
    }

    /**
     * @return bool
     */
    public function isHasPool(): bool
    {
        return $this->hasPool;
    }

    /**
     * @param bool $hasPool
     */
    public function setHasPool(bool $hasPool): void
    {
        $this->hasPool = $hasPool;
    }

    /**
     * @return bool
     */
    public function isHasClothesStudio(): bool
    {
        return $this->hasClothesStudio;
    }

    /**
     * @param bool $hasClothesStudio
     */
    public function setHasClothesStudio(bool $hasClothesStudio): void
    {
        $this->hasClothesStudio = $hasClothesStudio;
    }

    /**
     * @return bool
     */
    public function isHasWarehouse(): bool
    {
        return $this->hasWarehouse;
    }

    /**
     * @param bool $hasWarehouse
     */
    public function setHasWarehouse(bool $hasWarehouse): void
    {
        $this->hasWarehouse = $hasWarehouse;
    }

    /**
     * @return bool
     */
    public function isHasPark(): bool
    {
        return $this->hasPark;
    }

    /**
     * @param bool $hasPark
     */
    public function setHasPark(bool $hasPark): void
    {
        $this->hasPark = $hasPark;
    }

    /**
     * @return bool
     */
    public function isHasRestaurant(): bool
    {
        return $this->hasRestaurant;
    }

    /**
     * @param bool $hasRestaurant
     */
    public function setHasRestaurant(bool $hasRestaurant): void
    {
        $this->hasRestaurant = $hasRestaurant;
    }

    /**
     * @return bool
     */
    public function isHasFitnessCentre(): bool
    {
        return $this->hasFitnessCentre;
    }

    /**
     * @param bool $hasFitnessCentre
     */
    public function setHasFitnessCentre(bool $hasFitnessCentre): void
    {
        $this->hasFitnessCentre = $hasFitnessCentre;
    }

    /**
     * @return bool
     */
    public function isHasSupermarket(): bool
    {
        return $this->hasSupermarket;
    }

    /**
     * @param bool $hasSupermarket
     */
    public function setHasSupermarket(bool $hasSupermarket): void
    {
        $this->hasSupermarket = $hasSupermarket;
    }

    /**
     * @return bool
     */
    public function isHasMinimarket(): bool
    {
        return $this->hasMinimarket;
    }

    /**
     * @param bool $hasMinimarket
     */
    public function setHasMinimarket(bool $hasMinimarket): void
    {
        $this->hasMinimarket = $hasMinimarket;
    }

    /**
     * @return bool
     */
    public function isHasShoppingArea(): bool
    {
        return $this->hasShoppingArea;
    }

    /**
     * @param bool $hasShoppingArea
     */
    public function setHasShoppingArea(bool $hasShoppingArea): void
    {
        $this->hasShoppingArea = $hasShoppingArea;
    }

    /**
     * @return bool
     */
    public function isHasConferenceRoom(): bool
    {
        return $this->hasConferenceRoom;
    }

    /**
     * @param bool $hasConferenceRoom
     */
    public function setHasConferenceRoom(bool $hasConferenceRoom): void
    {
        $this->hasConferenceRoom = $hasConferenceRoom;
    }

    /**
     * @return bool
     */
    public function isHasFoodCourt(): bool
    {
        return $this->hasFoodCourt;
    }

    /**
     * @param bool $hasFoodCourt
     */
    public function setHasFoodCourt(bool $hasFoodCourt): void
    {
        $this->hasFoodCourt = $hasFoodCourt;
    }

    /**
     * @return bool
     */
    public function isHasSlotMachines(): bool
    {
        return $this->hasSlotMachines;
    }

    /**
     * @param bool $hasSlotMachines
     */
    public function setHasSlotMachines(bool $hasSlotMachines): void
    {
        $this->hasSlotMachines = $hasSlotMachines;
    }

    /**
     * @return bool
     */
    public function isHasAquapark(): bool
    {
        return $this->hasAquapark;
    }

    /**
     * @param bool $hasAquapark
     */
    public function setHasAquapark(bool $hasAquapark): void
    {
        $this->hasAquapark = $hasAquapark;
    }

    /**
     * @return bool
     */
    public function isHasBabySitting(): bool
    {
        return $this->hasBabySitting;
    }

    /**
     * @param bool $hasBabySitting
     */
    public function setHasBabySitting(bool $hasBabySitting): void
    {
        $this->hasBabySitting = $hasBabySitting;
    }

    /**
     * @return bool
     */
    public function isHasRink(): bool
    {
        return $this->hasRink;
    }

    /**
     * @param bool $hasRink
     */
    public function setHasRink(bool $hasRink): void
    {
        $this->hasRink = $hasRink;
    }

    /**
     * @return bool
     */
    public function isHasBowling(): bool
    {
        return $this->hasBowling;
    }

    /**
     * @param bool $hasBowling
     */
    public function setHasBowling(bool $hasBowling): void
    {
        $this->hasBowling = $hasBowling;
    }

    /**
     * @return bool
     */
    public function isHasGameRoom(): bool
    {
        return $this->hasGameRoom;
    }

    /**
     * @param bool $hasGameRoom
     */
    public function setHasGameRoom(bool $hasGameRoom): void
    {
        $this->hasGameRoom = $hasGameRoom;
    }

    /**
     * @param $hasCarWash
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasCarWash(
        $hasCarWash,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasCarWash) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж", "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasCarService
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasCarService(
        $hasCarService,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasCarService) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж", "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasTire
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasTire(
        $hasTire,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasTire) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasInspectionPit
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasInspectionPit(
        $hasInspectionPit,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasInspectionPit) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasVideoSurveillance
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasVideoSurveillance(
        $hasVideoSurveillance,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasVideoSurveillance) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasHourSecurity
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasHourSecurity(
        $hasHourSecurity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasHourSecurity) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasAutomaticGates
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasAutomaticGates(
        $hasAutomaticGates,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasAutomaticGates) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasEntryByPass
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasEntryByPass(
        $hasEntryByPass,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasEntryByPass) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBasement
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBasement(
        $hasBasement,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBasement) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_GARAGE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Гараж"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBuffet
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBuffet(
        $hasBuffet,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBuffet) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasCanteen
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasCanteen(
        $hasCanteen,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasCanteen) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasCentralReception
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasCentralReception(
        $hasCentralReception,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasCentralReception) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasHotel
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasHotel(
        $hasHotel,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasHotel) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Производство", "Склад", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasOfficeSpace
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasOfficeSpace(
        $hasOfficeSpace,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasOfficeSpace) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_INDUSTRY_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_WAREHOUSE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Производство", "Склад"'
            )->addViolation();
        }
    }

    /**
     * @param $hasAtm
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasAtm(
        $hasAtm,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasAtm) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasExhibitionAndWarehouseComplex
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasExhibitionAndWarehouseComplex(
        $hasExhibitionAndWarehouseComplex,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasExhibitionAndWarehouseComplex) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $hasPharmacy
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasPharmacy(
        $hasPharmacy,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasPharmacy) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBankDepartment
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBankDepartment(
        $hasBankDepartment,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBankDepartment) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasCafe
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasCafe(
        $hasCafe,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasCafe) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasMedicalCenter
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasMedicalCenter(
        $hasMedicalCenter,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasMedicalCenter) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBeautyShop
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBeautyShop(
        $hasBeautyShop,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBeautyShop) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasStudio
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasStudio(
        $hasStudio,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasStudio) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasNotaryOffice
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasNotaryOffice(
        $hasNotaryOffice,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasNotaryOffice) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $hasPark
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasPark(
        $hasPark,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasPark) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $hasPool
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasPool(
        $hasPool,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasPool) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasClothesStudio
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasClothesStudio(
        $hasClothesStudio,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasClothesStudio) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasWarehouse
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasWarehouse(
        $hasWarehouse,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasWarehouse) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasRestaurant
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasRestaurant(
        $hasRestaurant,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasRestaurant) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasFitnessCentre
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasFitnessCentre(
        $hasFitnessCentre,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasFitnessCentre) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasSupermarket
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasSupermarket(
        $hasSupermarket,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasSupermarket) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasMinimarket
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasMinimarket(
        $hasMinimarket,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasMinimarket) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис", "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasShoppingArea
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasShoppingArea(
        $hasShoppingArea,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasShoppingArea) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $hasConferenceRoom
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasConferenceRoom(
        $hasConferenceRoom,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasConferenceRoom) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_OFFICE_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Офис"'
            )->addViolation();
        }
    }

    /**
     * @param $hasFoodCourt
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasFoodCourt(
        $hasFoodCourt,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasFoodCourt) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasSlotMachines
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasSlotMachines(
        $hasSlotMachines,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasSlotMachines) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasAquapark
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasAquapark(
        $hasAquapark,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasAquapark) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBabySitting
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBabySitting(
        $hasBabySitting,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBabySitting) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasRink
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasRink(
        $hasRink,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasRink) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasBowling
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasBowling(
        $hasBowling,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasBowling) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }

    /**
     * @param $hasGameRoom
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public static function validateHasGameRoom(
        $hasGameRoom,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($hasGameRoom) && !in_array($object->getCategory(), array(
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_RENT,
                CategoryInterface::COMMERCIAL_CATEGORY_SHOPPING_AREA_SALE
            ))) {
            $context->buildViolation(
                'Данное поле заполняется для категорий "Торговая площадь"'
            )->addViolation();
        }
    }
}