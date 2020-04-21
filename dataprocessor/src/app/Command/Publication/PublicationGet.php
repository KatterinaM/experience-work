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
class PublicationGet extends AbstractCommand
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
     * GetPublicastion constructor.
     * @param LoggerInterface $log
     * @param PublicationServiceInterface $publications
     */
    public function __construct(LoggerInterface $log, PublicationServiceInterface $publications)
    {
        parent::__construct('publication:get', 'Retrieve publication by using API');

        $this
            ->argument('<id>', 'Publication ID')
            ->usage('<bold>publication:get</end> <comment>123</end><eol/>');

        $this->log = $log;
        $this->publications = $publications;
    }

    /**
     * Retrive publication data from API
     * @param int $id
     * @return Publication
     */
    public function execute(int $id): Publication
    {
        $this->log->info('publication:get', ['id' => $id]);

        $publication = $this->publications->getPublicationData($id);

        $this->log->debug('publication:get', ['result' => $publication]);

        return $publication;
    }
}
