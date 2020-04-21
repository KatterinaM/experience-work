<?php

namespace App\Entity\Publication\API;

use JMS\Serializer\Annotation\Inline;
use JMS\Serializer\Annotation\Type;

/**
 * Class Publication
 * @package App\Entity\Publication\API
 */
class Response
{
    /**
     * @var bool
     * @Type("bool")
     * @Inline
     */
    public $success;

    /**
     * @var Publication[]
     * @Type("array")
     * @Inline
     */
    public $items;
}
