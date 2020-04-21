<?php

namespace App\Command\Queue;

use App\Command\AbstractCommand;
use App\Entity\Queue\QueueJob as Job;
use App\Service\Queue\QueueServiceException;
use App\Service\Queue\QueueServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class QueueProcess
 * @package App\Command
 */
class QueueJobGet extends AbstractCommand
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
     * QueueProcess constructor.
     * @param LoggerInterface $log
     * @param QueueServiceInterface $queue
     */
    public function __construct(LoggerInterface $log, QueueServiceInterface $queue)
    {
        parent::__construct('queue:job:get', 'Get single job from specified queue');

        $this
            ->argument('<queue>', 'Queue name')
            ->usage('<bold>queue:process</end> <comment>queue_name</end><eol/>');

        $this->log = $log;
        $this->queue = $queue;
    }

    /**
     * Send message to specified queue
     * @param string $queue
     * @return void
     * @throws QueueServiceException
     */
    public function execute(string $queue): void
    {
        $this->log->info('queue:job:get', ['queue' => $queue]);

        /** @var Job $job */
        $job = $this->queue->getJob($queue);

        $this->log->debug('queue:job:get', ['queue' => $queue, 'job' => $job]);
    }
}
