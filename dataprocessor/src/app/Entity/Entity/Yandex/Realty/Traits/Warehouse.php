<?php

namespace App\Entity\Yandex\Realty\Traits;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Trait Warehouse
 * @package App\Entity\Yandex\Realty\Traits
 */
trait Warehouse
{
    /**
     * @var bool
     * @Serializer\SerializedName("responsible-storage")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $responsibleStorage;

    /**
     * @var int
     * @Serializer\SerializedName("pallet-price")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("int")
     * @Constraints\GreaterThanOrEqual(0)
     */
    private $palletPrice;

    /**
     * @var bool
     * @Serializer\SerializedName("freight-elevator")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $freightElevator;

    /**
     * @var bool
     * @Serializer\SerializedName("truck-entrance")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $truckEntrance;

    /**
     * @var bool
     * @Serializer\SerializedName("ramp")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $ramp;

    /**
     * @var bool
     * @Serializer\SerializedName("railway")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $railway;

    /**
     * @var bool
     * @Serializer\SerializedName("office-warehouse")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $officeWarehouse;

    /**
     * @var bool
     * @Serializer\SerializedName("open-area")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $openArea;

    /**
     * @var bool
     * @Serializer\SerializedName("service-three-pl")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $serviceThreePL;

    /**
     * @var string
     * @Serializer\SerializedName("temperature-comment")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $temperatureComment;

    /**
     * @return bool
     */
    public function isResponsibleStorage(): bool
    {
        return $this->responsibleStorage;
    }

    /**
     * @param bool $responsibleStorage
     */
    public function setResponsibleStorage(bool $responsibleStorage): void
    {
        $this->responsibleStorage = $responsibleStorage;
    }

    /**
     * @return int
     */
    public function getPalletPrice(): int
    {
        return $this->palletPrice;
    }

    /**
     * @param int $palletPrice
     */
    public function setPalletPrice(int $palletPrice): void
    {
        $this->palletPrice = $palletPrice;
    }

    /**
     * @return bool
     */
    public function isFreightElevator(): bool
    {
        return $this->freightElevator;
    }

    /**
     * @param bool $freightElevator
     */
    public function setFreightElevator(bool $freightElevator): void
    {
        $this->freightElevator = $freightElevator;
    }

    /**
     * @return bool
     */
    public function isTruckEntrance(): bool
    {
        return $this->truckEntrance;
    }

    /**
     * @param bool $truckEntrance
     */
    public function setTruckEntrance(bool $truckEntrance): void
    {
        $this->truckEntrance = $truckEntrance;
    }

    /**
     * @return bool
     */
    public function isRamp(): bool
    {
        return $this->ramp;
    }

    /**
     * @param bool $ramp
     */
    public function setRamp(bool $ramp): void
    {
        $this->ramp = $ramp;
    }

    /**
     * @return bool
     */
    public function isRailway(): bool
    {
        return $this->railway;
    }

    /**
     * @param bool $railway
     */
    public function setRailway(bool $railway): void
    {
        $this->railway = $railway;
    }

    /**
     * @return bool
     */
    public function isOfficeWarehouse(): bool
    {
        return $this->officeWarehouse;
    }

    /**
     * @param bool $officeWarehouse
     */
    public function setOfficeWarehouse(bool $officeWarehouse): void
    {
        $this->officeWarehouse = $officeWarehouse;
    }

    /**
     * @return bool
     */
    public function isOpenArea(): bool
    {
        return $this->openArea;
    }

    /**
     * @param bool $openArea
     */
    public function setOpenArea(bool $openArea): void
    {
        $this->openArea = $openArea;
    }

    /**
     * @return bool
     */
    public function isServiceThreePL(): bool
    {
        return $this->serviceThreePL;
    }

    /**
     * @param bool $serviceThreePL
     */
    public function setServiceThreePL(bool $serviceThreePL): void
    {
        $this->serviceThreePL = $serviceThreePL;
    }

    /**
     * @return string
     */
    public function getTemperatureComment(): string
    {
        return $this->temperatureComment;
    }

    /**
     * @param string $temperatureComment
     */
    public function setTemperatureComment(string $temperatureComment): void
    {
        $this->temperatureComment = $temperatureComment;
    }
}
