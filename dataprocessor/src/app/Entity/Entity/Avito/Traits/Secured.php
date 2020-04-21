<?php

namespace App\Entity\Avito\Traits;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;

/**
 * Trait Secured
 * @package App\Entity\Avito\Traits
 */
trait Secured
{
    /**
     * @var string
     * @SerializedName("Secured")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     * @Constraints\Choice(choices = \App\Entity\Avito\Base\SecuredInterface::SECURED_STATUSES)
     */
    private $secured;

    /**
     * @return string
     */
    public function getSecured(): string
    {
        return $this->secured;
    }

    /**
     * @param string $secured
     */
    public function setSecured(string $secured): void
    {
        $this->secured = $secured;
    }


}
