<?php

namespace App\Entity\Yandex\Realty\Traits;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Trait Premise
 * @package App\Entity\Yandex\Realty
 */
trait Premise
{
    /**
     * @var int
     * @Serializer\SerializedName("rooms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $rooms;

    /**
     * @var int
     * @Serializer\SerializedName("floor")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("int")
     */
    private $floor;

    /**
     * @var string
     * @Serializer\SerializedName("entrance-type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\PremiseInterface::ENTRANCE_TYPES)
     */
    private $entranceType;

    /**
     * @var int
     * @Serializer\SerializedName("phone-lines")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThanOrEqual(0)
     */
    private $phoneLines;

    /**
     * @var bool
     * @Serializer\SerializedName("adding-phone-on-request")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $addingPhoneOnRequest;

    /**
     * @var bool
     * @Serializer\SerializedName("internet")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $internet;

    /**
     * @var bool
     * @Serializer\SerializedName("self-selection-telecom")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $selfSelectionTelecom;

    /**
     * @var bool
     * @Serializer\SerializedName("room-furniture")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $roomFurniture;

    /**
     * @var bool
     * @Serializer\SerializedName("air-conditioner")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $airConditioner;

    /**
     * @var bool
     * @Serializer\SerializedName("ventilation")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $ventilation;

    /**
     * @var bool
     * @Serializer\SerializedName("fire-alarm")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $fireAlarm;

    /**
     * @var bool
     * @Serializer\SerializedName("water-supply")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $waterSupply;

    /**
     * @var bool
     * @Serializer\SerializedName("sewerage-supply")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $sewerageSupply;

    /**
     * @var bool
     * @Serializer\SerializedName("electricity-supply")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $electricitySupply;

    /**
     * @var int
     * @Serializer\SerializedName("electric-capacity")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThan(0)
     */
    private $electricCapacity;

    /**
     * @var bool
     * @Serializer\SerializedName("gas-supply")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $gasSupply;

    /**
     * @var string
     * @Serializer\SerializedName("floor-covering")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\PremiseInterface::FLOOR_COVERINGS)
     */
    private $floorCovering;

    /**
     * @var bool
     * @Serializer\SerializedName("heating-supply")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $heatingSupply;

    /**
     * @var string
     * @Serializer\SerializedName("window-type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\PremiseInterface::WINDOW_TYPES)
     */
    private $windowType;

    /**
     * @var string
     * @Serializer\SerializedName("window-view")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\Base\PremiseInterface::WINDOW_VIEWS)
     */
    private $windowView;

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return int
     */
    public function getFloor(): int
    {
        return $this->floor;
    }

    /**
     * @param int $floor
     */
    public function setFloor(int $floor): void
    {
        $this->floor = $floor;
    }

    /**
     * @return string
     */
    public function getEntranceType(): string
    {
        return $this->entranceType;
    }

    /**
     * @param string $entranceType
     */
    public function setEntranceType(string $entranceType): void
    {
        $this->entranceType = $entranceType;
    }

    /**
     * @return int
     */
    public function getPhoneLines(): int
    {
        return $this->phoneLines;
    }

    /**
     * @param int $phoneLines
     */
    public function setPhoneLines(int $phoneLines): void
    {
        $this->phoneLines = $phoneLines;
    }

    /**
     * @return bool
     */
    public function isAddingPhoneOnRequest(): bool
    {
        return $this->addingPhoneOnRequest;
    }

    /**
     * @param bool $addingPhoneOnRequest
     */
    public function setAddingPhoneOnRequest(bool $addingPhoneOnRequest): void
    {
        $this->addingPhoneOnRequest = $addingPhoneOnRequest;
    }

    /**
     * @return bool
     */
    public function isInternet(): bool
    {
        return $this->internet;
    }

    /**
     * @param bool $internet
     */
    public function setInternet(bool $internet): void
    {
        $this->internet = $internet;
    }

    /**
     * @return bool
     */
    public function isSelfSelectionTelecom(): bool
    {
        return $this->selfSelectionTelecom;
    }

    /**
     * @param bool $selfSelectionTelecom
     */
    public function setSelfSelectionTelecom(bool $selfSelectionTelecom): void
    {
        $this->selfSelectionTelecom = $selfSelectionTelecom;
    }

    /**
     * @return bool
     */
    public function isRoomFurniture(): bool
    {
        return $this->roomFurniture;
    }

    /**
     * @param bool $roomFurniture
     */
    public function setRoomFurniture(bool $roomFurniture): void
    {
        $this->roomFurniture = $roomFurniture;
    }

    /**
     * @return bool
     */
    public function isAirConditioner(): bool
    {
        return $this->airConditioner;
    }

    /**
     * @param bool $airConditioner
     */
    public function setAirConditioner(bool $airConditioner): void
    {
        $this->airConditioner = $airConditioner;
    }

    /**
     * @return bool
     */
    public function isVentilation(): bool
    {
        return $this->ventilation;
    }

    /**
     * @param bool $ventilation
     */
    public function setVentilation(bool $ventilation): void
    {
        $this->ventilation = $ventilation;
    }

    /**
     * @return bool
     */
    public function isFireAlarm(): bool
    {
        return $this->fireAlarm;
    }

    /**
     * @param bool $fireAlarm
     */
    public function setFireAlarm(bool $fireAlarm): void
    {
        $this->fireAlarm = $fireAlarm;
    }

    /**
     * @return bool
     */
    public function isWaterSupply(): bool
    {
        return $this->waterSupply;
    }

    /**
     * @param bool $waterSupply
     */
    public function setWaterSupply(bool $waterSupply): void
    {
        $this->waterSupply = $waterSupply;
    }

    /**
     * @return bool
     */
    public function isSewerageSupply(): bool
    {
        return $this->sewerageSupply;
    }

    /**
     * @param bool $sewerageSupply
     */
    public function setSewerageSupply(bool $sewerageSupply): void
    {
        $this->sewerageSupply = $sewerageSupply;
    }

    /**
     * @return bool
     */
    public function isElectricitySupply(): bool
    {
        return $this->electricitySupply;
    }

    /**
     * @param bool $electricitySupply
     */
    public function setElectricitySupply(bool $electricitySupply): void
    {
        $this->electricitySupply = $electricitySupply;
    }

    /**
     * @return int
     */
    public function getElectricCapacity(): int
    {
        return $this->electricCapacity;
    }

    /**
     * @param int $electricCapacity
     */
    public function setElectricCapacity(int $electricCapacity): void
    {
        $this->electricCapacity = $electricCapacity;
    }

    /**
     * @return bool
     */
    public function isGasSupply(): bool
    {
        return $this->gasSupply;
    }

    /**
     * @param bool $gasSupply
     */
    public function setGasSupply(bool $gasSupply): void
    {
        $this->gasSupply = $gasSupply;
    }

    /**
     * @return string
     */
    public function getFloorCovering(): string
    {
        return $this->floorCovering;
    }

    /**
     * @param string $floorCovering
     */
    public function setFloorCovering(string $floorCovering): void
    {
        $this->floorCovering = $floorCovering;
    }

    /**
     * @return bool
     */
    public function isHeatingSupply(): bool
    {
        return $this->heatingSupply;
    }

    /**
     * @param bool $heatingSupply
     */
    public function setHeatingSupply(bool $heatingSupply): void
    {
        $this->heatingSupply = $heatingSupply;
    }

    /**
     * @return string
     */
    public function getWindowType(): string
    {
        return $this->windowType;
    }

    /**
     * @param string $windowType
     */
    public function setWindowType(string $windowType): void
    {
        $this->windowType = $windowType;
    }

    /**
     * @return string
     */
    public function getWindowView(): string
    {
        return $this->windowView;
    }

    /**
     * @param string $windowView
     */
    public function setWindowView(string $windowView): void
    {
        $this->windowView = $windowView;
    }
}
