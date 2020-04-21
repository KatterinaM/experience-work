<?php

namespace App\Command\Queue;

use App\Command\AbstractCommand;
use App\Service\Queue\QueueServiceException;
use App\Service\Queue\QueueServiceInterface;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;

/**
 * Class QueueGet
 * @package App\Command
 */
class QueueMessageGet extends AbstractCommand
{
    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var QueueServiceInterface
     */
    protected $queue;

    /**
     * QueueGet constructor.
     * @param LoggerInterface $log
     * @param QueueServiceInterface $queue
     */
    public function __construct(LoggerInterface $log, QueueServiceInterface $queue)
    {
        parent::__construct('queue:message:get', 'Get single message from specified queue');

        $this
            ->argument('<queue>', 'Queue name')
            ->usage('<bold>queue:job:get</end> <comment>queue_name</end><eol/>');

        $this->log = $log;
        $this->queue = $queue;
    }

    /**
     * Send message to specified queue
     * @param string $queue
     * @return AMQPMessage|null
     * @throws QueueServiceException
     */
    public function execute(string $queue): ?AMQPMessage
    {
        $this->log->info('queue:message:get', ['queue' => $queue]);

        $message = $this->queue->getMessage($queue);

        $messageBody = !empty($message)
            ? $message->getBody()
            : null;

        $this->log->debug('queue:message:get', ['queue' => $queue, 'message' => $messageBody]);

        return $message;
    }
}
