<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\MarketTypeInterface;
use App\Entity\Avito\Base\OperationTypeInterface;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait MarketType
 * @package App\Entity\Avito\Traits
 */
trait MarketType
{
    /**
     * @var string
     * @SerializedName("MarketType")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\MarketType", "validateMarketType" })
     */
    private $marketType;

    /**
     * @return string|null
     */
    public function getMarketType(): ?string
    {
        return $this->marketType;
    }

    /**
     * @param string $marketType
     */
    public function setMarketType(string $marketType): void
    {
        $this->marketType = $marketType;
    }

    /**
     * @param mixed $marketType
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateMarketType(
        $marketType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Обязательно для типа (OperationType) "Продам" в категории "Квартиры"
        if ($object->getOperationType() == OperationTypeInterface::OPERATION_TYPE_SELL
            && $object->getCategory() == AbstractAd::CATEGORY_APARTMENTS
            && $marketType != MarketTypeInterface::MARKET_TYPE_NEW
            && $marketType != MarketTypeInterface::MARKET_TYPE_OLD
        ) {
            $context->buildViolation('Поле обязательно для типа (OperationType) "Продам" в категории "Квартиры"')
                ->addViolation();
        }
    }
}
