<?php

namespace App\Service\Queue\AMQP;

use Exception;
use App\Entity\Queue\QueueJob;
use JMS\Serializer\SerializerInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection as AMQPConnection;
use Psr\Log\LoggerInterface;
use App\Service\Queue\QueueServiceInterface;
use App\Service\Queue\QueueServiceException;

/**
 * Class QueueService
 * @package App\Service\Queue
 */
class QueueAMQPService implements QueueServiceInterface
{
    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var AMQPConnection
     */
    protected $connection;

    /**
     * @var array<string>
     */
    protected $queueNames = [];

    /**
     * @var AMQPChannel
     */
    protected $channel;

    /**
     * QueueService constructor.
     * @param LoggerInterface $log
     * @param SerializerInterface $serializer
     * @param AMQPConnection $connection
     * @param array $queueNames
     */
    public function __construct(
        LoggerInterface $log,
        SerializerInterface $serializer,
        AMQPConnection $connection,
        array $queueNames
    ) {
        $this->log = $log;
        $this->connection = $connection;
        $this->queueNames = $queueNames;
        $this->serializer = $serializer;
    }

    /**
     * Initialize AMQP connection
     */
    public function initConnection(): void
    {
        try {
            // Init channel
            $this->channel = $this->connection->channel();

            foreach ($this->queueNames as $name) {
                // Setup queues
                $this->channel->queue_declare($name, false, true, false, false);

                // Setup exchanges
                $this->channel->exchange_declare($name, AMQPExchangeType::DIRECT, false, true, false);

                // Bind queues to channels
                $this->channel->queue_bind($name, $name, $name);
            }
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Close queue connection
     * @throws QueueServiceException
     */
    public function closeConnection(): void
    {
        try {
            $this->channel->close();
            $this->connection->close();
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Serialize job into JSON
     * @param QueueJob $job
     * @return string
     */
    public function serializeJob(QueueJob $job): string
    {
        try {
            return $this->serializer->serialize($job, 'json');
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Deserialize job
     * @param AMQPMessage|string $message
     * @return QueueJob|null
     */
    public function deserializeJob($message): ?QueueJob
    {
        try {
            // Setup message body
            $messageBody = $message instanceof AMQPMessage
                ? $message->getBody()
                : (string) $message;

            // Check message body
            if (!empty($messageBody)) {
                return $this->serializer->deserialize($messageBody, QueueJob::class, 'json');
            }
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
        return null;
    }

    /**
     * Publish message to specified queue
     * @param string $queueName
     * @param mixed $data
     * @throws QueueServiceException
     */
    public function publishMessage(string $queueName, $data): void
    {
        if (!in_array($queueName, $this->queueNames)) {
            throw new QueueServiceException('Invalid queue name: ' . $queueName);
        }

        // Send message
        try {
            // Setup message body
            $messageBody = $data instanceof QueueJob
                ? $this->serializeJob($data)
                : (string) $data;

            // Create queue message
            $data = new AMQPMessage(
                $messageBody,
                [
                    'content_type' => 'text/plain',
                    'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
                ]
            );

            $this->channel->basic_publish($data, $queueName, $queueName);
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Publish message to specified queue
     * @param string $queueName
     * @param QueueJob $job
     * @throws QueueServiceException
     */
    public function publishJob(string $queueName, QueueJob $job): void
    {
        try {
            $data = $this->serializeJob($job);
            $this->publishMessage($queueName, $data);
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $queueName
     * @return AMQPMessage
     * @throws QueueServiceException
     */
    public function getMessage(string $queueName): ?AMQPMessage
    {
        try {
            /** @var AMQPMessage $message */
            $message = $this->channel->basic_get($queueName);
            if (!empty($message)) {
                $this->channel->basic_ack($message->getDeliveryTag());
                return $message;
            }
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
        return null;
    }

    /**
     * @param string $queueName
     * @return QueueJob|null
     * @throws QueueServiceException
     */
    public function getJob(string $queueName): ?QueueJob
    {
        try {
            $message = $this->getMessage($queueName);
            return $this->deserializeJob($message);
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Consume jobs
     * @param string $queueName
     * @param callable $callback
     * @throws QueueServiceException
     */
    public function consumeJobs(string $queueName, callable $callback): void
    {
        try {
            // Register consumer
            $this->channel->basic_consume(
                $queueName,
                $queueName,
                false,
                false,
                false,
                false,
                function (AMQPMessage $message) use ($callback) {
                    $callback($this->deserializeJob($message));
                    $this->channel->basic_ack($message->getDeliveryTag());
                }
            );

            // Loop while cunsumer is registred
            while ($this->channel->is_consuming()) {
                $this->channel->wait(null, true);
                // Wait a moment
                usleep(1000000);
            }
        } catch (Exception $e) {
            throw new QueueServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
