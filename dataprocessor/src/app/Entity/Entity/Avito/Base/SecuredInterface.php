<?php

namespace App\Entity\Avito\Base;

/**
 * Interface SecuredInterface
 * @package App\Entity\Avito\Base
 */
interface SecuredInterface
{
    const SECURED_STATUS_YES = 'Да';
    const SECURED_STATUS_NO = 'Нет';

    const SECURED_STATUSES = [
        self::SECURED_STATUS_YES,
        self::SECURED_STATUS_NO,
    ];
}
