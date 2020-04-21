<?php

namespace App\Entity\Avito\Traits;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Trait ContactInfo
 * @package App\Entity\Avito\Traits
 */
trait ContactInfo
{
    /**
     * @var string Available values: "Да" (default), "Нет"
     * @SerializedName("AllowEmail")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $allowEmail;

    /**
     * @var string
     * @SerializedName("CompanyName")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $companyName;

    /**
     * @var string
     * @SerializedName("ManagerName")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $managerName;

    /**
     * @var string
     * @SerializedName("ContactPhone")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $contactPhone;

    /**
     * @return string
     */
    public function getAllowEmail(): string
    {
        return $this->allowEmail;
    }

    /**
     * @param string $allowEmail
     */
    public function setAllowEmail(string $allowEmail): void
    {
        $this->allowEmail = $allowEmail;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getManagerName(): string
    {
        return $this->managerName;
    }

    /**
     * @param string $managerName
     */
    public function setManagerName(string $managerName): void
    {
        $this->managerName = $managerName;
    }

    /**
     * @return string
     */
    public function getContactPhone(): string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone(string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }
}
