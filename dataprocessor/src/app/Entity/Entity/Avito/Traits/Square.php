<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Square
 * @package App\Entity\Avito\Traits
 */
trait Square
{
    /**
     * @var float
     * @SerializedName("Square")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Square", "validateSquare" })
     */
    private $square;

    /**
     * @return float
     */
    public function getSquare(): float
    {
        return $this->square;
    }

    /**
     * @param float $square
     */
    public function setSquare(float $square): void
    {
        $this->square = $square;
    }

    /**
     * @param mixed $square
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateSquare(
        $square,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        /*
         * Обязательно в категориях:
         * - Квартиры
         * - Комнаты
         * - Дома, дачи, коттеджи
         * - Гаражи и машиноместа
         * - Коммерческая недвижимость
         */
        if (is_null($square) && in_array($object->getCategory(), [
                AbstractAd::CATEGORY_APARTMENTS,
                AbstractAd::CATEGORY_ROOMS,
                AbstractAd::CATEGORY_COTTAGES,
                AbstractAd::CATEGORY_GARAGES,
                AbstractAd::CATEGORY_COMMERCIAL,
            ])) {
            $context->buildViolation(
                'Поле обязательно в категориях: '
                . '"Квартиры", '
                . '"Комнаты", '
                . '"Дома, дачи, коттеджи"'
                . '"Гаражи и машиноместа", '
                . '"Коммерческая недвижимость", '
            )->addViolation();
        }
    }
}
