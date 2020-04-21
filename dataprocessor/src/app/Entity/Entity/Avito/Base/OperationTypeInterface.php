<?php

namespace App\Entity\Avito\Base;

/**
 * Interface OperationTypeInterface
 * @package App\Entity\Avito\Base
 */
interface OperationTypeInterface
{
    const OPERATION_TYPE_SELL = 'Продам';
    const OPERATION_TYPE_LEASE = 'Сдам';

    const LEASE_TYPE_LONG = 'На длительный срок';
    const LEASE_TYPE_DAILY = 'Посуточно';

    const LEASE_DEPOSIT_TYPES = [
        'Без залога',
        '0,5 месяца',
        '1 месяц',
        '1,5 месяца',
        '2 месяца',
        '2,5 месяца',
        '3 месяца',
    ];

    const PRICE_TYPE_SELL_FOR_ALL = 'за всё';
    const PRICE_TYPE_SELL_PER_M2 = 'за м2';

    const PRICE_TYPE_LEASE_PER_MONTH = 'в месяц';
    const PRICE_TYPE_LEASE_PER_MONTH_PER_M2 = 'в месяц за м2';
    const PRICE_TYPE_LEASE_PER_YEAR = 'в год';
    const PRICE_TYPE_LEASE_PER_YEAR_PER_M2 = 'в год за м2';
}
