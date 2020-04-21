<?php

namespace App\Tests\Unit\Entity\Avito\Sell;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Sell\ApartmetsAd;
use App\Entity\Avito\Traits\ExtendedPropertyRights;
use App\Entity\Avito\Traits\SellOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class ApartmetsAdTest
 * @package App\Tests\Unit\Entity\Avito\Sell
 */
class ApartmetsAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            SellOperationType::class,
            ExtendedPropertyRights::class,
        ], array_values(class_uses(ApartmetsAd::class)));
    }


    public function testCommonFields()
    {
        $ad = new ApartmetsAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_APARTMENTS,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_SELL,
            $ad->getOperationType()
        );

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
            PropertyRightsInterface::PROPERTY_RIGHTS_DEVELOPER,
        ], $ad->getAvailablePropertyRights());
    }
}
