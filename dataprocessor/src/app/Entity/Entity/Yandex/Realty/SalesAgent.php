<?php

namespace App\Entity\Yandex\Realty;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class SalesAgent
 * @package App\Entity\Yandex\Realty
 */
class SalesAgent
{
    const CATEGORY_AGENCY = 'agency';
    const CATEGORY_OWNER = 'owner';
    const CATEGORY_DEVELOPER = 'developer';

    const CATEGORIES = [
        self::CATEGORY_AGENCY,
        self::CATEGORY_OWNER,
        self::CATEGORY_DEVELOPER,
    ];

    /**
     * @var string
     * @Serializer\SerializedName("name")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $name;

    /**
     * @var string
     * @Serializer\SerializedName("phone")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     */
    private $phone;

    /**
     * @var string
     * @Serializer\SerializedName("category")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\SalesAgent::CATEGORIES)
     */
    private $category;

    /**
     * @var string
     * @Serializer\SerializedName("organization")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $organization;

    /**
     * @var string
     * @Serializer\SerializedName("url")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Url()
     */
    private $url;

    /**
     * @var string
     * @Serializer\SerializedName("email")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Email()
     */
    private $email;

    /**
     * @var string
     * @Serializer\SerializedName("photo")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Url()
     */
    private $photo;

    /**
     * @var string
     * @Serializer\SerializedName("partner")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $partner;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getPartner(): string
    {
        return $this->partner;
    }

    /**
     * @param string $partner
     */
    public function setPartner(string $partner): void
    {
        $this->partner = $partner;
    }
}
