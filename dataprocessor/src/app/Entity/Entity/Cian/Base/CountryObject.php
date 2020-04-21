<?php

namespace App\Entity\Cian\Base;

use App\Entity\Cian\Base\AbstractObject;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\ConditionsCountryRealty;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\CountryCategoryType;
use App\Entity\Cian\Traits\Land;
use App\Entity\Cian\Traits\ShareAmount;
use App\Entity\Cian\Traits\TermsLease;
use App\Entity\Cian\Traits\TotalArea;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class CountryAd
 * @package App\Entity\Cian\Base
 */
class CountryObject  extends AbstractObject
{
    use CountryCategoryType;
    use ShareAmount;
    use TermsLease;
    use AllInfrastructure;
    use Land;
    use TotalArea;
    use ConditionsCountryRealty;
    use BargainTerms;
    use Building;
}