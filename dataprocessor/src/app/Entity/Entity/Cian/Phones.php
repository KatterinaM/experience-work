<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Phones
 * @package App\Entity\Cian
 */
class Phones
{
    /**
     * @var string
     * @Serializer\SerializedName("CountryCode")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("string")
     */
    private $countryCode;

    /**
     * @var string
     * @Serializer\SerializedName("Number")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Type("string")
     */
    private $number;

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }
}