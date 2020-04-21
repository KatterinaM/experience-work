<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class ExcludedServicesEnum
 * @package App\Entity\Cian
 */
class ExcludedServicesEnum
{
    const EXCLUDED_SERVICES_ENUM_HIGHLIGHT = 'highlight';
    const EXCLUDED_SERVICES_ENUM_PREMIUM = 'premium';
    const EXCLUDED_SERVICES_ENUM_TOP3 = 'top3 ';

    const EXCLUDED_SERVICES_ENUM = [
        self::EXCLUDED_SERVICES_ENUM_HIGHLIGHT,
        self::EXCLUDED_SERVICES_ENUM_PREMIUM,
        self::EXCLUDED_SERVICES_ENUM_TOP3,
    ];

    /**
     * @var string
     * @Serializer\SerializedName("ExcludedServicesEnum")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\ExcludedServicesEnum::EXCLUDED_SERVICES_ENUM)
     */
    private $excludedServicesEnum;

    /**
     * @return string
     */
    public function getExcludedServicesEnum(): string
    {
        return $this->excludedServicesEnum;
    }

    /**
     * @param string $excludedServicesEnum
     */
    public function setExcludedServicesEnum(string $excludedServicesEnum): void
    {
        $this->excludedServicesEnum = $excludedServicesEnum;
    }
}