<?php

namespace App\Entity\Cian\Traits;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait BaseCategoryType
 * @package App\Entity\Cian\Traits
 */
trait BaseCategoryType
{
    /**
     * @var string
     * @Serializer\SerializedName("Category")
     * @Serializer\XmlElement(cdata=false)
     */
    private $category;

    /**
     * Get available object types
     * @return array<string>
     */
    abstract public function getAvailableCategoryTypes(): array;

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
}