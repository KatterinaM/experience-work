<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Flat
 * @package App\Entity\Cian
 */
class Flat
{
    /**
     * @var int
     * @Serializer\SerializedName("FlatNumber")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $flatNumber;

    /**
     * @var string
     * @Serializer\SerializedName("SectionNumber")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $sectionNumber;

    /**
     * @var string
     * @Serializer\SerializedName("FlatType")
     * @Serializer\XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $flatType;

    /**
     * @return int
     */
    public function getFlatNumber(): int
    {
        return $this->flatNumber;
    }

    /**
     * @param int $flatNumber
     */
    public function setFlatNumber(int $flatNumber): void
    {
        $this->flatNumber = $flatNumber;
    }

    /**
     * @return string
     */
    public function getSectionNumber(): string
    {
        return $this->sectionNumber;
    }

    /**
     * @param string $sectionNumber
     */
    public function setSectionNumber(string $sectionNumber): void
    {
        $this->sectionNumber = $sectionNumber;
    }

    /**
     * @return string
     */
    public function getFlatType(): string
    {
        return $this->flatType;
    }

    /**
     * @param string $flatType
     */
    public function setFlatType(string $flatType): void
    {
        $this->flatType = $flatType;
    }
}