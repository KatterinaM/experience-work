<?php


namespace App\Command\Publication;

use App\Command\AbstractCommand;
use App\Entity\Publication\API\Publication;
use App\Service\Publication\DockerException;
use App\Service\Publication\PublicationServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class GetPublicastion
 * @package App\Command
 */
class PublicationList extends AbstractCommand
{
    /**
     * @var LoggerInterface
     */
    private $log;

    /**
     * @var PublicationServiceInterface
     */
    private $publications;

    /**
     * PublicationList constructor.
     * @param LoggerInterface $log
     * @param PublicationServiceInterface $publications
     */
    public function __construct(LoggerInterface $log, PublicationServiceInterface $publications)
    {
        parent::__construct('publication:list', 'Retrieve publication list by using API');

        $this
            ->usage('<bold>publication:list</end><eol/>');

        $this->log = $log;
        $this->publications = $publications;
    }

    /**
     * Retrive publication list from API
     * @return Publication[]
     * @throws DockerException
     */
    public function execute(): array
    {
        $this->log->info('publication:list', []);

        $list = $this->publications->getPublicationList();

        $this->log->debug('publication:list', ['result' => $list]);

        return $list;
    }
}
