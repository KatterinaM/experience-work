<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Traits\SellOperationType;
use PHPUnit\Framework\TestCase;

/**
 * Class SellOperationTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class SellOperationTypeTest extends TestCase
{
    private $class;

    public function testValidOperationType(): void
    {
        $ad = new $this->class;

        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertEquals(
            OperationTypeInterface::OPERATION_TYPE_SELL,
            $ad->getOperationType()
        );
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class {
            use SellOperationType;
        };
    }
}
