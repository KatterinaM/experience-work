<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class RentByPartsSchema
 * @package App\Entity\Cian
 */
class RentByPartsSchema
{
    /**
     * @var AreaParts
     * @Serializer\SerializedName("RentByPartsSchema")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\AreaParts")
     */
    private $rentByPartsSchema;

    /**
     * @return AreaParts
     */
    public function getRentByPartsSchema(): AreaParts
    {
        return $this->rentByPartsSchema;
    }

    /**
     * @param AreaParts $rentByPartsSchema
     */
    public function setRentByPartsSchema(AreaParts $rentByPartsSchema): void
    {
        $this->rentByPartsSchema = $rentByPartsSchema;
    }


}