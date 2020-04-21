<?php

namespace App\Entity\Queue;

use JMS\Serializer\Annotation\Type;

/**
 * Class QueueJob
 * @package App\Entity\Queue
 */
class QueueJob
{
    /**
     * @var string
     * @Type("string")
     */
    public $command;

    /**
     * @var array
     * @Type("array")
     */
    public $data;
}
