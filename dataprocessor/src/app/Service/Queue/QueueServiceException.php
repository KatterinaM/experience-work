<?php

namespace App\Service\Queue;

use Throwable;
use RuntimeException;

/**
 * Class QueueException
 * @package App\Service\Queue
 */
class QueueServiceException extends RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
