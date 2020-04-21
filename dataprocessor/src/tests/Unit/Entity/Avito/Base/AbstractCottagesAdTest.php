<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractCottagesAd;
use App\Entity\Avito\Traits\Floors;
use App\Entity\Avito\Traits\LandArea;
use App\Entity\Avito\Traits\Location;
use App\Entity\Avito\Traits\Square;
use App\Entity\Avito\Traits\StandardPropertyRights;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractCottagesAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 */
class AbstractCottagesAdTest extends TestCase
{
    public function testTraits()
    {
        $this->assertEquals([
            StandardPropertyRights::class,
            Location::class,
            Square::class,
            LandArea::class,
            Floors::class,
        ], array_values(class_uses(AbstractCottagesAd::class)));
    }

    public function testWallTypes()
    {
        $this->assertEquals([
            'Кирпич',
            'Брус',
            'Бревно',
            'Газоблоки',
            'Металл',
            'Пеноблоки',
            'Сэндвич-панели',
            'Ж/б панели',
            'Экспериментальные материалы',
        ], AbstractCottagesAd::WALL_TYPES);
    }
}
