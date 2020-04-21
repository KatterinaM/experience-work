<?php

namespace App\Tests\Unit\Entity;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

/**
 * Class ValidationTest
 * @package App\Tests\Unit\Entity
 */
class ValidationTestCase extends TestCase
{
    /** @var MockObject|ExecutionContextInterface */
    protected $context;

    /** @var MockObject|ConstraintViolationBuilderInterface */
    protected $builder;

    /**
     * ValidationTestCase constructor.
     * @param null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        // Execution context
        $this->context = $this->createMock(ExecutionContextInterface::class);

        // Violation builder
        $this->builder = $this->createMock(ConstraintViolationBuilderInterface::class);
    }

    /**
     * @param $object
     * @param $violation
     * @param bool $expectsGetObject
     * @return MockObject|ExecutionContextInterface
     */
    protected function getContext($object, $violation, $expectsGetObject = true): ExecutionContextInterface
    {
        // Mock method ExecutionContextInterface::getObject()
        $getObjectExpectation = $expectsGetObject
            ? $this->once()
            : $this->never();

        $this->context
            ->expects($getObjectExpectation)
            ->method('getObject')
            ->willReturn($object);

        // Mocke method ExecutionContextInterface::buildViolation()
        $violationExpectation = $violation
            ? $this->atLeastOnce()
            : $this->never();

        $this->context
            ->expects($violationExpectation)
            ->method('buildViolation')
            ->willReturn($this->builder);

        return $this->context;
    }
}
