<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class PhoneSchema
 * @package App\Entity\Cian
 */
class PhoneSchema
{
    /**
     * @var Phones
     * @Serializer\SerializedName("PhoneSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Cian\Phones")
     */
    private $phoneSchema;

    /**
     * @return Phones
     */
    public function getPhoneSchema(): Phones
    {
        return $this->phoneSchema;
    }

    /**
     * @param Phones $phoneSchema
     */
    public function setPhoneSchema(Phones $phoneSchema): void
    {
        $this->phoneSchema = $phoneSchema;
    }
}