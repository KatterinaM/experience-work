<?php

namespace App\Entity\Yandex\Realty\Traits;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Trait Building
 * @package App\Entity\Yandex\Realty\Traits
 */
trait Building
{
    /**
     * @var string
     * @Serializer\SerializedName("office-class")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\BuildingInterface::OFFICE_CLASSES)
     */
    private $officeClass;

    /**
     * @var float
     * @Serializer\SerializedName("ceiling-height")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("float")
     * @Constraints\GreaterThan(0)
     */
    private $ceilingHeight;

    /**
     * @var bool
     * @Serializer\SerializedName("guarded-building")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $guardedBuilding;

    /**
     * @var bool
     * @Serializer\SerializedName("access-control-system")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $accessControlSystem;

    /**
     * @var bool
     * @Serializer\SerializedName("twenty-four-seven")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $twentyFourSeven;

    /**
     * @var bool
     * @Serializer\SerializedName("lift")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $lift;

    /**
     * @var bool
     * @Serializer\SerializedName("parking")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $parking;

    /**
     * @var int
     * @Serializer\SerializedName("parking-places")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThanOrEqual(0)
     */
    private $parkingPlaces;

    /**
     * @var int
     * @Serializer\SerializedName("parking-place-price")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThanOrEqual(0)
     */
    private $parkingPlacePrice;

    /**
     * @var int
     * @Serializer\SerializedName("parking-guest")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThanOrEqual(0)
     */
    private $parkingGuest;

    /**
     * @var bool
     * @Serializer\SerializedName("parking-guest-places")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $parkingGuestPlaces;

    /**
     * @var bool
     * @Serializer\SerializedName("security")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $security;

    /**
     * @var bool
     * @Serializer\SerializedName("eating-facilities")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $eatingFacilities;

    /**
     * @var bool
     * @Serializer\SerializedName("is-elite")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $isElite;

    /**
     * @return string
     */
    public function getOfficeClass(): string
    {
        return $this->officeClass;
    }

    /**
     * @param string $officeClass
     */
    public function setOfficeClass(string $officeClass): void
    {
        $this->officeClass = $officeClass;
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
     * @return bool
     */
    public function isGuardedBuilding(): bool
    {
        return $this->guardedBuilding;
    }

    /**
     * @param bool $guardedBuilding
     */
    public function setGuardedBuilding(bool $guardedBuilding): void
    {
        $this->guardedBuilding = $guardedBuilding;
    }

    /**
     * @return bool
     */
    public function isAccessControlSystem(): bool
    {
        return $this->accessControlSystem;
    }

    /**
     * @param bool $accessControlSystem
     */
    public function setAccessControlSystem(bool $accessControlSystem): void
    {
        $this->accessControlSystem = $accessControlSystem;
    }

    /**
     * @return bool
     */
    public function isTwentyFourSeven(): bool
    {
        return $this->twentyFourSeven;
    }

    /**
     * @param bool $twentyFourSeven
     */
    public function setTwentyFourSeven(bool $twentyFourSeven): void
    {
        $this->twentyFourSeven = $twentyFourSeven;
    }

    /**
     * @return bool
     */
    public function isLift(): bool
    {
        return $this->lift;
    }

    /**
     * @param bool $lift
     */
    public function setLift(bool $lift): void
    {
        $this->lift = $lift;
    }

    /**
     * @return bool
     */
    public function isParking(): bool
    {
        return $this->parking;
    }

    /**
     * @param bool $parking
     */
    public function setParking(bool $parking): void
    {
        $this->parking = $parking;
    }

    /**
     * @return int
     */
    public function getParkingPlaces(): int
    {
        return $this->parkingPlaces;
    }

    /**
     * @param int $parkingPlaces
     */
    public function setParkingPlaces(int $parkingPlaces): void
    {
        $this->parkingPlaces = $parkingPlaces;
    }

    /**
     * @return int
     */
    public function getParkingPlacePrice(): int
    {
        return $this->parkingPlacePrice;
    }

    /**
     * @param int $parkingPlacePrice
     */
    public function setParkingPlacePrice(int $parkingPlacePrice): void
    {
        $this->parkingPlacePrice = $parkingPlacePrice;
    }

    /**
     * @return int
     */
    public function getParkingGuest(): int
    {
        return $this->parkingGuest;
    }

    /**
     * @param int $parkingGuest
     */
    public function setParkingGuest(int $parkingGuest): void
    {
        $this->parkingGuest = $parkingGuest;
    }

    /**
     * @return bool
     */
    public function isParkingGuestPlaces(): bool
    {
        return $this->parkingGuestPlaces;
    }

    /**
     * @param bool $parkingGuestPlaces
     */
    public function setParkingGuestPlaces(bool $parkingGuestPlaces): void
    {
        $this->parkingGuestPlaces = $parkingGuestPlaces;
    }

    /**
     * @return bool
     */
    public function isSecurity(): bool
    {
        return $this->security;
    }

    /**
     * @param bool $security
     */
    public function setSecurity(bool $security): void
    {
        $this->security = $security;
    }

    /**
     * @return bool
     */
    public function isEatingFacilities(): bool
    {
        return $this->eatingFacilities;
    }

    /**
     * @param bool $eatingFacilities
     */
    public function setEatingFacilities(bool $eatingFacilities): void
    {
        $this->eatingFacilities = $eatingFacilities;
    }

    /**
     * @return bool
     */
    public function isElite(): bool
    {
        return $this->isElite;
    }

    /**
     * @param bool $isElite
     */
    public function setIsElite(bool $isElite): void
    {
        $this->isElite = $isElite;
    }
}
