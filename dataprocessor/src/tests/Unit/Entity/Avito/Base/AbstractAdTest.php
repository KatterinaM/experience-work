<?php

namespace App\Tests\Unit\Entity\Avito\Base;

use App\Entity\Avito\Base\AbstractAd;
use App\Tests\Unit\Entity\ValidationTestCase;
use DateTime;
use Exception;
use RuntimeException;

/**
 * Class AbstractAdTest
 * @package App\Tests\Unit\Entity\Avito\Base
 *
 */
class AbstractAdTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider dateEndProvider
     * @param $dateEnd
     * @param $violation
     * @throws Exception
     */
    public function testValidateDateEnd($dateEnd, $violation): void
    {
        /** @var AbstractAd $ad */
        $ad = new $this->class;
        $ad->setDateBegin(new DateTime());

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateDateEnd($dateEnd, $this->getContext($ad, $violation), null);
    }

    public function testSetUndefindedField(): void
    {
        $this->expectException(RuntimeException::class);

        $ad = new $this->class;
        $ad->undefinedField = null;
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class extends AbstractAd
        {
            public function getCategory(): string
            {
                return null;
            }
        };
    }

    /**
     * @return array
     * @throws Exception
     */
    public function dateEndProvider(): array
    {
        return [
            [new DateTime('-1 day'), true],
            [new DateTime('+1 day'), false],
        ];
    }
}
