<?php

namespace App\Tests\Unit\Entity\Avito\Sell;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Sell\LandPlotAd;
use App\Entity\Avito\Traits\SellOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class LandPlotAdTest
 * @package App\Tests\Unit\Entity\Avito\Sell
 */
class LandPlotAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            SellOperationType::class,
        ], array_values(class_uses(LandPlotAd::class)));
    }

    public function testCommonFields()
    {
        $ad = new LandPlotAd();

        $this->assertEquals(
            AbstractAd::CATEGORY_LAND_PLOTS,
            $ad->getCategory()
        );

        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_SELL,
            $ad->getOperationType()
        );

        $this->assertEquals([
            PropertyRightsInterface::PROPERTY_RIGHTS_OWNER,
            PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR,
        ], $ad->getAvailablePropertyRights());
    }
}
