<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class CplModeration
 * @package App\Entity\Cian
 */
class CplModeration
{
    const PERSON_TYPE = [
        self::PERSON_TYPE_LEGAL,
        self::PERSON_TYPE_NATURAL
    ];

    const PERSON_TYPE_LEGAL = "legal";
    const PERSON_TYPE_NATURAL = "natural";

    /**
     * @var string
     * @Serializer\SerializedName("PersonType")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Choice(choices = \App\Entity\Cian\CplModeration::PERSON_TYPE)
     */
    private $personType;

    /**
     * @var string
     * @Serializer\SerializedName("FirstName")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $firstName;

    /**
     * @var string
     * @Serializer\SerializedName("SecondName")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $secondName;

    /**
     * @var string
     * @Serializer\SerializedName("LastName")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $lastName;

    /**
     * @var string
     * @Serializer\SerializedName("Inn")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $inn;

    /**
     * @return string
     */
    public function getPersonType(): string
    {
        return $this->personType;
    }

    /**
     * @param string $personType
     */
    public function setPersonType(string $personType): void
    {
        $this->personType = $personType;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->secondName;
    }

    /**
     * @param string $secondName
     */
    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getInn(): string
    {
        return $this->inn;
    }

    /**
     * @param string $inn
     */
    public function setInn(string $inn): void
    {
        $this->inn = $inn;
    }
}