<?php

namespace App\Command\Queue;

use App\Command\AbstractCommand;
use App\Service\Queue\QueueServiceException;
use App\Service\Queue\QueueServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class QueuePublish
 * @package App\Command
 */
class QueueMessagePublish extends AbstractCommand
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
     * QueuePublish constructor.
     * @param LoggerInterface $log
     * @param QueueServiceInterface $queue
     */
    public function __construct(LoggerInterface $log, QueueServiceInterface $queue)
    {
        parent::__construct('queue:message:publish', 'Publish message to specified queue');

        $this
            ->argument('<queue>', 'Queue name')
            ->argument('<message>', 'Message to send')
            ->usage('<bold>queue:publish</end> <comment>queue_name "{ \"Foo\": \"Bar\" }"</end><eol/>');

        $this->log = $log;
        $this->queue = $queue;
    }

    /**
     * Send message to specified queue
     * @param string $queue
     * @param mixed $message
     * @return void
     * @throws QueueServiceException
     */
    public function execute(string $queue, string $message): void
    {
        $this->log->info('queue:message:publish', ['queue' => $queue, 'message' => $message]);

        $this->queue->publishMessage($queue, $message);

        $this->log->debug('queue:message:publish', ['published' => ['queue' => $queue, 'message' => $message]]);
    }
}
