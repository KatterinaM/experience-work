<?php

namespace App\Tests\Unit\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Traits\ExtendedPropertyRights;
use App\Entity\Avito\Traits\LeaseOperationType;
use App\Tests\Unit\Entity\ValidationTestCase;

/**
 * Class LeaseOperationTypeTest
 * @package App\Tests\Unit\Entity\Avito\Traits
 */
class LeaseOperationTypeTest extends ValidationTestCase
{
    private $class;

    /**
     * @dataProvider validCategoryProvider
     * @param $category
     * @param $leaseType
     * @param $violation
     */
    public function testValidateLeaseType($category, $leaseType, $violation): void
    {
        $ad = new $this->class($category);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseType($leaseType, $this->getContext($ad, $violation), null);
    }

    public function testValidateLeaseOptions(): void
    {
        $this->context
            ->expects($this->once())
            ->method('buildViolation')
            ->willReturn($this->builder);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseOptions(['unexisting_option'], $this->context, []);
    }

    /**
     * @dataProvider leaseCommissionProvider
     * @param $leaseType
     * @param $propertyRights
     * @param $leaseCommissionSize
     * @param $violation
     */
    public function testValidateLeaseCommissionSize($leaseType, $propertyRights, $leaseCommissionSize, $violation): void
    {
        $ad = new $this->class(null);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setLeaseType($leaseType);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setPropertyRights($propertyRights);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseCommissionSize($leaseCommissionSize, $this->getContext($ad, $violation), null);
    }

    /**
     * @dataProvider leaseDepositProvider
     * @param $leaseType
     * @param $leaseDeposit
     * @param $violation
     */
    public function testValidateLeaseDeposit($leaseType, $leaseDeposit, $violation)
    {
        $ad = new $this->class(null);

        /** @noinspection PhpUndefinedMethodInspection */
        $ad->setLeaseType($leaseType);

        /** @noinspection PhpUndefinedMethodInspection */
        $this->class::validateLeaseDeposit($leaseDeposit, $this->getContext($ad, $violation), null);
    }

    protected function setUp(): void
    {
        // Ad class
        $this->class = new class($category = null) extends AbstractAd {
            use LeaseOperationType;
            use ExtendedPropertyRights;

            private $category;

            public function __construct(?string $category)
            {
                $this->category = $category;
            }

            public function getCategory(): string
            {
                return $this->category;
            }
        };
    }

    /**
     * @return array
     */
    public function validCategoryProvider(): array
    {
        return [
            [AbstractAd::CATEGORY_APARTMENTS, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_APARTMENTS, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_APARTMENTS, null, true],

            [AbstractAd::CATEGORY_ROOMS, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_ROOMS, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_ROOMS, null, true],

            [AbstractAd::CATEGORY_COTTAGES, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_COTTAGES, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_COTTAGES, null, true],

            [AbstractAd::CATEGORY_LAND_PLOTS, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_LAND_PLOTS, null, false],

            [AbstractAd::CATEGORY_GARAGES, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_GARAGES, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_GARAGES, null, false],

            [AbstractAd::CATEGORY_COMMERCIAL, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_COMMERCIAL, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_COMMERCIAL, null, false],

            [AbstractAd::CATEGORY_FOREIGN, OperationTypeInterface::LEASE_TYPE_LONG, false],
            [AbstractAd::CATEGORY_FOREIGN, OperationTypeInterface::LEASE_TYPE_DAILY, false],
            [AbstractAd::CATEGORY_FOREIGN, null, true],
        ];
    }

    /**
     * @return array
     */
    public function leaseCommissionProvider(): array
    {
        return [
            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_DEVELOPER, null, false],
            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_DEVELOPER, 123, false],

            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR, null, true],
            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR, 123, false],

            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_OWNER, null, false],
            [OperationTypeInterface::LEASE_TYPE_LONG, PropertyRightsInterface::PROPERTY_RIGHTS_OWNER, 123, false],
        ];
    }

    /**
     * @return array
     */
    public function leaseDepositProvider(): array
    {
        return [
            [OperationTypeInterface::LEASE_TYPE_LONG, null, true],
            [OperationTypeInterface::LEASE_TYPE_LONG, 0, true],
            [OperationTypeInterface::LEASE_TYPE_LONG, 123, false],
        ];
    }
}
