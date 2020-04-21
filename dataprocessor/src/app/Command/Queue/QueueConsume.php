<?php

namespace App\Command\Queue;

use App\Command\AbstractCommand;
use App\Entity\Queue\QueueJob;
use App\Service\Queue\QueueServiceException;
use App\Service\Queue\QueueServiceInterface;
use League\Tactician\CommandBus;
use Psr\Log\LoggerInterface;
use Throwable;

/**
 * Class QueueProcess
 * @package App\Command
 */
class QueueConsume extends AbstractCommand
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
     * @var CommandBus
     */
    protected $bus;

    /**
     * QueueProcess constructor.
     * @param LoggerInterface $log
     * @param QueueServiceInterface $queue
     * @param CommandBus $bus
     */
    public function __construct(LoggerInterface $log, QueueServiceInterface $queue, CommandBus $bus)
    {
        parent::__construct('queue:consume', 'Consume job queue');

        $this
            ->argument('<queue>', 'Queue name')
            ->usage('<bold>queue:process</end> <comment>queue_name</end><eol/>');

        $this->log = $log;
        $this->queue = $queue;
        $this->bus = $bus;
    }

    /**
     * Send message to specified queue
     * @param string $queue
     * @return void
     * @throws QueueServiceException
     */
    public function execute(string $queue): void
    {
        $this->log->info('queue:consume', ['queue' => $queue]);

        $this->queue->consumeJobs($queue, function (QueueJob $job) use ($queue) {
            $this->log->debug('queue:consume', ['queue' => $queue, 'job' => $job]);
            try {
                $this->bus->handle($job);
            } catch (Throwable $e) {
                $this->log->error($e->getMessage(), [$e]);
            }
        });
    }
}
