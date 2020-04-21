<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class PublishTerms
 * @package App\Entity\Cian
 */
class PublishTerms
{
    /**
     * @var ServicesEnum
     * @Serializer\SerializedName("Services")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\ServicesEnum")
     * @Constraints\Valid()
     */
    private $services;

    /**
     * @var ExcludedServicesEnum
     * @Serializer\SerializedName("ExcludedServices")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\ExcludedServicesEnum")
     * @Constraints\Valid()
     */
    private $excludedServices;

    /**
     * @var bool
     * @Serializer\SerializedName("IgnoreServicePackages")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $isRentByParts;

    /**
     * @return ServicesEnum
     */
    public function getServices(): ServicesEnum
    {
        return $this->services;
    }

    /**
     * @param ServicesEnum $services
     */
    public function setServices(ServicesEnum $services): void
    {
        $this->services = $services;
    }

    /**
     * @return ExcludedServicesEnum
     */
    public function getExcludedServices(): ExcludedServicesEnum
    {
        return $this->excludedServices;
    }

    /**
     * @param ExcludedServicesEnum $excludedServices
     */
    public function setExcludedServices(ExcludedServicesEnum $excludedServices): void
    {
        $this->excludedServices = $excludedServices;
    }

    /**
     * @return bool
     */
    public function isRentByParts(): bool
    {
        return $this->isRentByParts;
    }

    /**
     * @param bool $isRentByParts
     */
    public function setIsRentByParts(bool $isRentByParts): void
    {
        $this->isRentByParts = $isRentByParts;
    }
}