<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\HouseType;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\MarketType;
use App\Entity\Avito\Traits\Rooms;
use App\Entity\Avito\Traits\Square;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AbstractAppartmentsAd
 * @package App\Entity\Avito\Base
 */
class AbstractApartmentsAd extends AbstractAd
{
    use Location;
    use Rooms;
    use Square;
    use Floors;
    use HouseType;
    use MarketType;

    const DECORATION_TYPE_NONE = 'Без отделки';
    const DECORATION_TYPE_ROUGH = 'Черновая';
    const DECORATION_TYPE_FINE = 'Чистовая';

    const DECORATION_TYPES = [
        self::DECORATION_TYPE_NONE,
        self::DECORATION_TYPE_ROUGH,
        self::DECORATION_TYPE_FINE,
    ];

    /**
     * @var float
     * @SerializedName("KitchenSpace")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $kitchenSpace;

    /**
     * @var float
     * @SerializedName("LivingSpace")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $livingSpace;

    /**
     * @var string
     * @SerializedName("CadastralNumber")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Base\AbstractApartmentsAd", "validateCadastralNumber" })
     */
    private $cadastralNumber;

    /**
     * @var string
     * @SerializedName("Decoration")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Avito\Base\AbstractApartmentsAd::DECORATION_TYPES)
     * @Constraints\Callback({ "App\Entity\Avito\Base\AbstractApartmentsAd", "validateDecoration" })
     */
    private $decoration;

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return AbstractAd::CATEGORY_APARTMENTS;
    }

    /**
     * @return float
     */
    public function getKitchenSpace(): float
    {
        return $this->kitchenSpace;
    }

    /**
     * @param float $kitchenSpace
     */
    public function setKitchenSpace(float $kitchenSpace): void
    {
        $this->kitchenSpace = $kitchenSpace;
    }

    /**
     * @return float
     */
    public function getLivingSpace(): float
    {
        return $this->livingSpace;
    }

    /**
     * @param float $livingSpace
     */
    public function setLivingSpace(float $livingSpace): void
    {
        $this->livingSpace = $livingSpace;
    }

    /**
     * @return string
     */
    public function getCadastralNumber(): string
    {
        return $this->cadastralNumber;
    }

    /**
     * @param string $cadastralNumber
     */
    public function setCadastralNumber(string $cadastralNumber): void
    {
        $this->cadastralNumber = $cadastralNumber;
    }

    /**
     * @return string
     */
    public function getDecoration(): string
    {
        return $this->decoration;
    }

    /**
     * @param string $decoration
     */
    public function setDecoration(string $decoration): void
    {
        $this->decoration = $decoration;
    }

    /**
     * @param mixed $cadastralNumber
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateCadastralNumber(
        $cadastralNumber,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        if (!preg_match('/^\d{2}:\d{2}:\d{6,7}:\d{1,35}$/', $cadastralNumber)) {
            $context->buildViolation('Неверный формат кадастрового номера')
                ->addViolation();
        }
    }

    /**
     * @param mixed $decoration
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateDecoration(
        $decoration,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Отделка помещения (только для типов объекта (MarketType) "Новостройка")
        if (!is_null($decoration) && $object->getMarketType() != MarketTypeInterface::MARKET_TYPE_NEW) {
            $context->buildViolation('This value is wrong.')
                ->addViolation();
        }
    }
}
