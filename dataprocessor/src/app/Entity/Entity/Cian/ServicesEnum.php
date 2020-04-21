<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class ServicesEnum
 * @package App\Entity\Cian
 */
class ServicesEnum
{
    const SERVICES_ENUM_FREE = 'free';
    const SERVICES_ENUM_HIGHLIGHT = 'highlight';
    const SERVICES_ENUM_PAID = 'paid';
    const SERVICES_ENUM_PREMIUM = 'premium';
    const SERVICES_ENUM_TOP3 = 'top3 ';

    const SERVICES_ENUM = [
        self::SERVICES_ENUM_FREE,
        self::SERVICES_ENUM_HIGHLIGHT,
        self::SERVICES_ENUM_PAID,
        self::SERVICES_ENUM_PREMIUM,
        self::SERVICES_ENUM_TOP3,
    ];

    /**
     * @var string
     * @Serializer\SerializedName("ServicesEnum")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\ServicesEnum::SERVICES_ENUM)
     */
    private $servicesEnum;

    /**
     * @return string
     */
    public function getServicesEnum(): string
    {
        return $this->servicesEnum;
    }

    /**
     * @param string $servicesEnum
     */
    public function setServicesEnum(string $servicesEnum): void
    {
        $this->servicesEnum = $servicesEnum;
    }
}