<?php

namespace App\Service\Publication;

use Throwable;
use RuntimeException;

/**
 * Class PublicationClientException
 * @package App\Service\PublicationClient
 */
class PublicationServiceException extends RuntimeException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
