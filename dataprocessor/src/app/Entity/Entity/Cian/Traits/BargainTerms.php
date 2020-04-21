<?php

namespace App\Entity\Cian\Traits;

use App\Entity\Cian\BargainTermsInfo;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait BargainTerms
 * @package App\Entity\Cian\Traits
 */
trait BargainTerms
{
    /**
     * @var BargainTermsInfo
     * @Serializer\SerializedName("BargainTerms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\BargainTermsInfo")
     * @Constraints\Valid()
     */
    private $bargainTerms;

    /**
     * @return BargainTermsInfo
     */
    public function getBargainTerms(): BargainTermsInfo
    {
        return $this->bargainTerms;
    }

    /**
     * @param BargainTermsInfo $bargainTerms
     */
    public function setBargainTerms(BargainTermsInfo $bargainTerms): void
    {
        $this->bargainTerms = $bargainTerms;
    }
}