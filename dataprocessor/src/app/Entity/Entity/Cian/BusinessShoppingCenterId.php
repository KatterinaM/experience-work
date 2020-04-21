<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class BusinessShoppingCenterId
 * @package App\Entity\Cian
 */
class BusinessShoppingCenterId
{
    /**
     * @var int
     * @Serializer\Type("Id")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $businessShoppingCenterId;

    /**
     * @return int
     */
    public function getBusinessShoppingCenterId(): int
    {
        return $this->businessShoppingCenterId;
    }

    /**
     * @param int $businessShoppingCenterId
     */
    public function setBusinessShoppingCenterId(int $businessShoppingCenterId): void
    {
        $this->businessShoppingCenterId = $businessShoppingCenterId;
    }
}