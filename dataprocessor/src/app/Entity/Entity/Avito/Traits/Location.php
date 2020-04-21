<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\MarketTypeInterface;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Location
 * @package App\Entity\Avito\Traits
 */
trait Location
{
    /**
     * @var string
     * @SerializedName("Country")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateCountry" })
     */
    private $country;

    /**
     * @var string
     * @SerializedName("Address")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateAddress" })
     */
    private $address;

    /**
     * @var string
     * @SerializedName("NewDevelopmentId")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateNewDevelopmentId" })
     */
    private $newDevelopmentId;

    /**
     * @var float
     * @SerializedName("Latitude")
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateCoordinates" })
     */
    private $latitude;

    /**
     * @var float
     * @SerializedName("Longitude")
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateCoordinates" })
     */
    private $longitude;

    /**
     * @var int
     * @SerializedName("DistanceToCity")
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Location", "validateDistanceToCity" })
     */
    private $distanceToCity;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getNewDevelopmentId(): string
    {
        return $this->newDevelopmentId;
    }

    /**
     * @param string $newDevelopmentId
     */
    public function setNewDevelopmentId(string $newDevelopmentId): void
    {
        $this->newDevelopmentId = $newDevelopmentId;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return int
     */
    public function getDistanceToCity(): int
    {
        return $this->distanceToCity;
    }

    /**
     * @param int $distanceToCity
     */
    public function setDistanceToCity(int $distanceToCity): void
    {
        $this->distanceToCity = $distanceToCity;
    }

    /**
     * @param mixed $country
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateCountry(
        $country,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Должно присутствовать только в категории "Недвижимость за рубежом"
        if ($object->getCategory() == AbstractAd::CATEGORY_FOREIGN) {
            $wrong = is_null($country);
        } else {
            $wrong = !is_null($country);
        }

        if ($wrong) {
            $context->buildViolation('Поле должно присутствовать только в категории "Недвижимость за рубежом"')
                ->addViolation();
        }
    }

    /**
     * @param mixed $address
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateAddress(
        $address,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Должно присутствовать во всех категориях, кроме "Квартиры" типа (MarketType) "Новостройка"
        if ($object->getCategory() == AbstractAd::CATEGORY_APARTMENTS
            && $object->getMarketType() == MarketTypeInterface::MARKET_TYPE_NEW
        ) {
            $wrong = !empty($address);
        } else {
            $wrong = empty($address);
        }

        if ($wrong) {
            $context->buildViolation(
                'Поле должно присутствовать во всех категориях, кроме "Квартиры" типа (MarketType) "Новостройка"'
            )->addViolation();
        }
    }

    /**
     * @param mixed $newDevelopmentId
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateNewDevelopmentId(
        $newDevelopmentId,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Должно присутствовать только в категории "Квартиры" типа (MarketType) "Новостройка"
        if ($object->getCategory() == AbstractAd::CATEGORY_APARTMENTS
            && $object->getMarketType() == MarketTypeInterface::MARKET_TYPE_NEW
        ) {
            $wrong = empty($newDevelopmentId);
        } else {
            $wrong = !empty($newDevelopmentId);
        }

        if ($wrong) {
            $context->buildViolation(
                'Поле должно присутствовать только в категории "Квартиры" типа (MarketType) "Новостройка"'
            )->addViolation();
        }
    }

    /**
     * @param mixed $distanceToCity
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateDistanceToCity(
        $distanceToCity,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Обязательно в категориях "Дома, дачи, коттеджи" и "Земельные участки"
        if (in_array($object->getCategory(), [AbstractAd::CATEGORY_COTTAGES, AbstractAd::CATEGORY_LAND_PLOTS])
            && is_null($distanceToCity)
        ) {
            $context->buildViolation('Поле обязательно в категориях "Дома, дачи, коттеджи" и "Земельные участки"')
                ->addViolation();
        }
    }

    /**
     * @param mixed $value
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateCoordinates(
        $value,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Может присутствовать во всех категориях, кроме "Квартиры" типа (MarketType) "Новостройка"
        if ($object->getCategory() == AbstractAd::CATEGORY_APARTMENTS
            && $object->getMarketType() == MarketTypeInterface::MARKET_TYPE_NEW
            && !empty($value)) {
            $context->buildViolation(
                'Может присутствовать во всех категориях, кроме "Квартиры" типа (MarketType) "Новостройка"'
            )->addViolation();
        }
    }
}
