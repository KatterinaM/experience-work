<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\OperationTypeInterface;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Trait SellOperationType
 * @package App\Entity\Avito\Traits
 */
trait SellOperationType
{
    use BaseOperationType;

    /**
     * @VirtualProperty
     * @SerializedName("OperationType")
     * @XmlElement(cdata=false)
     * @return string
     */
    public function getOperationType(): string
    {
        return OperationTypeInterface::OPERATION_TYPE_SELL;
    }
}
