<?php

namespace App\Service\Queue;

use App\Entity\Queue\QueueJob;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Interface QueueServiceInterface
 * @package App\Service\Queue
 */
interface QueueServiceInterface
{
    /**
     * Initilize queue connection
     */
    public function initConnection(): void;

    /**
     * Close queue connection
     */
    public function closeConnection(): void;

    /**
     * Serialize job into JSON
     * @param QueueJob $job
     * @return string
     */
    public function serializeJob(QueueJob $job): string;

    /**
     * Deserialize job
     * @param AMQPMessage|string $message
     * @return QueueJob|null
     */
    public function deserializeJob($message): ?QueueJob;

    /**
     * Publish message to specified queue
     * @param string $queueName
     * @param mixed $data
     * @throws QueueServiceException
     */
    public function publishMessage(string $queueName, $data): void;

    /**
     * Publish job to specified queue
     * @param string $queueName
     * @param QueueJob $job
     * @throws QueueServiceException
     */
    public function publishJob(string $queueName, QueueJob $job): void;

    /**
     * Retrieve message from queue
     * @param string $queueName
     * @return AMQPMessage
     * @throws QueueServiceException
     */
    public function getMessage(string $queueName): ?AMQPMessage;

    /**
     * Retrieve job from queue
     * @param string $queueName
     * @return QueueJob|null
     * @throws QueueServiceException
     */
    public function getJob(string $queueName): ?QueueJob;

    /**
     * Consume jobs
     * @param string $queueName
     * @param callable $callback
     * @throws QueueServiceException
     */
    public function consumeJobs(string $queueName, callable $callback): void;
}
