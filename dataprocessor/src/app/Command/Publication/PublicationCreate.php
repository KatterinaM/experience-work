<?php


namespace App\Command\Publication;

use App\Command\AbstractCommand;
use App\Service\Docker\DockerServiceInterface;
use League\Pipeline\Pipeline;
use Psr\Log\LoggerInterface;

/**
 * Class CreatePublication
 * @package App\Command
 */
class PublicationCreate extends AbstractCommand
{
    /**
     * @var LoggerInterface
     */
    private $log;

    /**
     * @var DockerServiceInterface
     */
    private $docker;

    /**
     * CreatePublication constructor.
     * @param LoggerInterface $log
     * @param DockerServiceInterface $docker
     */
    public function __construct(LoggerInterface $log, DockerServiceInterface $docker)
    {
        parent::__construct('publication:create', 'Create publication');

        $this
            ->argument('<id>', 'Publication ID')
            ->usage('<bold>publication:create</end> <comment>123</end><eol/>');

        $this->log = $log;
        $this->docker = $docker;
    }

    /**
     * @param int $id Publication ID
     */
    public function execute(int $id)
    {
        $this->log->info('publication:create', ['id' => $id]);

        // Create command pipeline
        /** @var Pipeline $pipe */
        $pipe = (new Pipeline)
            ->pipe($this->app()->getCommandByName('publication:get')) // Get publication data
            ->pipe($this->app()->getCommandByName('publication:container:info')) // Get info for container
            ->pipe($this->app()->getCommandByName('docker:container:create')) // Create container
            ->pipe($this->app()->getCommandByName('docker:container:start')) // Start container
            ->pipe($this->app()->getCommandByName('docker:container:prepare')); // Clone git repository in container

        $info = $pipe->process(['id' => $id]);

        $this->log->debug('publication:create', ['info' => $info]);

        //  - Retrieve publicstion data
        //  - Process data
        //  - Publish data via DockerService
    }
}
