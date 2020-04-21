<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait BaseOperationType
 * @package App\Entity\Avito\Traits
 */
trait BaseOperationType
{
    /**
     * @var int
     * @SerializedName("Price")
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     * @Constraints\Type("int")
     */
    private $price;

    /**
     * @var string
     * @SerializedName("PriceType")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Traits\BaseOperationType", "validatePriceType" })
     */
    private $priceType;

    /**
     * @VirtualProperty
     * @SerializedName("OperationType")
     * @XmlElement(cdata=false)
     * @return string
     */
    abstract public function getOperationType(): string;

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPriceType(): string
    {
        return $this->priceType;
    }

    /**
     * @param string $priceType
     */
    public function setPriceType(string $priceType): void
    {
        $this->priceType = $priceType;
    }

    /**
     * @param mixed $priceType
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validatePriceType(
        $priceType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Поле допустимо только в категории "Коммерческая недвижимость"
        if (!is_null($priceType) && $object->getCategory() != AbstractAd::CATEGORY_COMMERCIAL) {
            $context->buildViolation('Поле допустимо только в категории "Коммерческая недвижимость"')
                ->addViolation();
        }

        // В зависимости от типа объявления
        switch ($object->getOperationType()) {
            case OperationTypeInterface::OPERATION_TYPE_SELL:
                if ($priceType != OperationTypeInterface::PRICE_TYPE_SELL_FOR_ALL
                    && $priceType != OperationTypeInterface::PRICE_TYPE_SELL_PER_M2
                    && !is_null($priceType)
                ) {
                    $context->buildViolation(
                        'Для типа операции "Продам" допустимые значения: "за всё", "за м2". '
                        . 'Текущее значение: "' . $priceType . '"'
                    )->addViolation();
                }
                break;

            case OperationTypeInterface::OPERATION_TYPE_LEASE:
                if ($priceType != OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH
                    && $priceType != OperationTypeInterface::PRICE_TYPE_LEASE_PER_MONTH_PER_M2
                    && $priceType != OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR
                    && $priceType != OperationTypeInterface::PRICE_TYPE_LEASE_PER_YEAR_PER_M2
                    && !is_null($priceType)
                ) {
                    $context->buildViolation(
                        'Для типа операции "Сдам" допустимые значения: '
                        . '"в месяц", '
                        . '"в месяц за м2", '
                        . '"в год", '
                        . '"в год за м2". '
                        . 'Текущее значение: "' . $priceType . '"'
                    )->addViolation();
                }
                break;
        }
    }
}
