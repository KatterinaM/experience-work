<?php

namespace App\Tests\Unit\Entity\Cian\Base;

use App\Entity\Cian\Base\CountryObject;
use App\Entity\Cian\Traits\AllInfrastructure;
use App\Entity\Cian\Traits\BargainTerms;
use App\Entity\Cian\Traits\Building;
use App\Entity\Cian\Traits\ConditionsCountryRealty;
use App\Entity\Cian\Traits\CountryCategoryType;
use App\Entity\Cian\Traits\Land;
use App\Entity\Cian\Traits\ShareAmount;
use App\Entity\Cian\Traits\TermsLease;
use App\Entity\Cian\Traits\TotalArea;
use PHPUnit\Framework\TestCase;

/**
 * Class CountryObjectTest
 * @package App\Tests\Unit\Entity\Cian\Base
 */
class CountryObjectTest extends TestCase
{
    private $class;

    public function testTraits()
    {
        $this->assertEquals([
            CountryCategoryType::class,
            ShareAmount::class,
            TermsLease::class,
            AllInfrastructure::class,
            Land::class,
            TotalArea::class,
            ConditionsCountryRealty::class,
            BargainTerms::class,
            Building::class
        ], array_values(class_uses(CountryObject::class)));
    }
}