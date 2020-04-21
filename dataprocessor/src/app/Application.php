<?php

namespace App;

use Ahc\Cli\Application as ConsoleApplication;
use App\Command\AbstractCommand;
use App\Command\Docker\DockerContainerCreate;
use App\Command\Docker\DockerContainerDelete;
use App\Command\Docker\DockerContainerExec;
use App\Command\Docker\DockerContainerList;
use App\Command\Docker\DockerContainerPrepare;
use App\Command\Docker\DockerContainerStart;
use App\Command\Docker\DockerContainerStop;
use App\Command\Publication\PublicationContainerInfo;
use App\Command\Publication\PublicationCreate;
use App\Command\Publication\PublicationGet;
use App\Command\Publication\PublicationList;
use App\Command\Queue\QueueConsume;
use App\Command\Queue\QueueMessageGet;
use App\Command\Queue\QueueJobGet;
use App\Command\Queue\QueueJobPublish;
use App\Command\Queue\QueueMessagePublish;
use App\Command\Temp\TestAvitoEntities;
use App\Command\Temp\TestCianEntities;
use App\Command\Temp\TestYandexRealtyEntities;
use App\Service\Docker\DockerServiceInterface;
use App\Service\Publication\PublicationServiceInterface;
use App\Service\Queue\QueueServiceInterface;
use App\Service\Yandex\Realty\FeedGeneratorServiceInterface as YandexFeedGeneratorInterface;
use App\Service\Avito\FeedGeneratorServiceInterface as AvitoFeedGeneratorInterface;
use App\Service\Cian\FeedGeneratorServiceInterface as CianFeedGeneratorInterface;
use JMS\Serializer\SerializerInterface;
use League\Container\Container;
use League\Tactician\CommandBus;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Application
 * @package App
 */
class Application extends ConsoleApplication implements ContainerInterface
{
    /**
     * @var callable
     */
    protected $onExit;

    /**
     * @var Container
     */
    protected $container;

    /**
     * Application constructor.
     * @param Container $container
     * @param string $name
     * @param string $version
     * @param callable|null $onExit
     */
    public function __construct(
        Container $container,
        string $name,
        string $version = '',
        callable $onExit = null
    ) {
        parent::__construct($name, $version, $onExit);

        // Setup container
        $this->container = $container;
        $this->container->share(static::class, $this);

        $this->registerCommands();
        $this->initQueue();
    }

    /**
     * Initialize queue
     */
    protected function initQueue(): void
    {
        // Initialize queue connection
        /** @var QueueServiceInterface $queue */
        $queue = $this->get(QueueServiceInterface::class);
        $queue->initConnection();

        // Close queue connection on shutdown
        register_shutdown_function(function () use ($queue) {
            $queue->closeConnection();
        });
    }

    /**
     * Register commands
     */
    protected function registerCommands(): void
    {
        $this->add(new PublicationGet(
            $this->get(LoggerInterface::class),
            $this->get(PublicationServiceInterface::class)
        ));

        $this->add(new PublicationList(
            $this->get(LoggerInterface::class),
            $this->get(PublicationServiceInterface::class)
        ));

        $this->add(new PublicationContainerInfo(
            $this->get(LoggerInterface::class)
        ));

        $this->add(new PublicationCreate(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new QueueMessagePublish(
            $this->get(LoggerInterface::class),
            $this->get(QueueServiceInterface::class)
        ));

        $this->add(new QueueJobPublish(
            $this->get(LoggerInterface::class),
            $this->get(SerializerInterface::class),
            $this->get(QueueServiceInterface::class)
        ));

        $this->add(new QueueMessageGet(
            $this->get(LoggerInterface::class),
            $this->get(QueueServiceInterface::class)
        ));

        $this->add(new QueueJobGet(
            $this->get(LoggerInterface::class),
            $this->get(QueueServiceInterface::class)
        ));

        $this->add(new QueueConsume(
            $this->get(LoggerInterface::class),
            $this->get(QueueServiceInterface::class),
            $this->get(CommandBus::class)
        ));

        $this->add(new DockerContainerList(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new DockerContainerCreate(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new DockerContainerStart(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new DockerContainerPrepare(
            $this->get(LoggerInterface::class)
        ));

        $this->add(new DockerContainerStop(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new DockerContainerDelete(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new DockerContainerExec(
            $this->get(LoggerInterface::class),
            $this->get(DockerServiceInterface::class)
        ));

        $this->add(new TestAvitoEntities(
            $this->get(LoggerInterface::class),
            $this->get(AvitoFeedGeneratorInterface::class),
            $this->get(SerializerInterface::class)
        ));

        $this->add(new TestCianEntities(
            $this->get(LoggerInterface::class),
            $this->get(CianFeedGeneratorInterface::class),
            $this->get(SerializerInterface::class)
        ));

        $this->add(new TestYandexRealtyEntities(
            $this->get(LoggerInterface::class),
            $this->get(YandexFeedGeneratorInterface::class),
            $this->get(SerializerInterface::class)
        ));
    }

    /**
     * Find command by name
     *
     * @param string $name
     * @return AbstractCommand|null
     */
    public function getCommandByName(string $name): ?AbstractCommand
    {
        /** @var AbstractCommand $cmd */
        $cmd = $this->commandFor(['', $name]);

        return $cmd->name() == '__default__'
            ? null
            : $cmd;
    }

    /**
     * Handle the request, invoke action and call exit handler.
     *
     * @param array $argv
     * @return mixed
     */
    public function handle(array $argv)
    {
        if (count($argv) < 2) {
            return $this->showHelp();
        }

        $command = $this->parse($argv);
        $this->doAction($command);
        $exitCode = 0;

        return ($this->onExit)($exitCode);
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     * @return mixed Entry.
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     * @return bool
     */
    public function has($id)
    {
        return $this->container->has($id);
    }
}
