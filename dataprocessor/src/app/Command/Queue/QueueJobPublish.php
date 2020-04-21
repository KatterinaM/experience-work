<?php

namespace App\Command\Queue;

use App\Command\AbstractCommand;
use App\Entity\Queue\QueueJob;
use App\Service\Queue\QueueServiceException;
use App\Service\Queue\QueueServiceInterface;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class QueuePublish
 * @package App\Command
 */
class QueueJobPublish extends AbstractCommand
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
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * QueuePublish constructor.
     * @param LoggerInterface $log
     * @param SerializerInterface $serializer
     * @param QueueServiceInterface $queue
     */
    public function __construct(LoggerInterface $log, SerializerInterface $serializer, QueueServiceInterface $queue)
    {
        parent::__construct('queue:job:publish', 'Publish job to specified queue');

        $this
            ->argument('<queue>', 'Queue name')
            ->argument('<job>', 'Job to send')
            ->usage('<bold>queue:publish</end> <comment>queue_name '
                . '\'{ "command": "test", "data": { "foo": "bar"}}\'"</end><eol/>');

        $this->log = $log;
        $this->queue = $queue;
        $this->serializer = $serializer;
    }

    /**
     * Send message to specified queue
     * @param string $queue
     * @param string $job
     * @return void
     * @throws QueueServiceException
     */
    public function execute(string $queue, string $job): void
    {
        $this->log->info('queue:job:publish', ['queue' => $queue, 'job' => $job]);

        /** @var QueueJob $job */
        $job = $this->queue->deserializeJob($job);

        $this->queue->publishJob($queue, $job);

        $this->log->debug('queue:job:publish', ['published' => ['queue' => $queue, 'job' => $job]]);
    }
}
