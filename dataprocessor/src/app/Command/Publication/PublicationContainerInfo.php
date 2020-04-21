<?php


namespace App\Command\Publication;

use App\Command\AbstractCommand;
use Psr\Log\LoggerInterface;

/**
 * Class CreatePublication
 * @package App\Command
 */
class PublicationContainerInfo extends AbstractCommand
{
    /**
     * @var LoggerInterface
     */
    private $log;

    /**
     * CreatePublication constructor.
     * @param LoggerInterface $log
     */
    public function __construct(LoggerInterface $log)
    {
        parent::__construct('publication:container:info', 'Get information to create container for publication');

        $this
            ->argument('<id>', 'Publication ID')
            ->argument('<domain>', 'Publication domain name')
            ->argument('<type>', 'Publication type')
            ->argument('[template]', 'Publication template name')
            ->usage('<bold>publication:container:info</end> <comment>123 landing default</end><eol/>');

        $this->log = $log;
    }

    /**
     * @param int $id Publication ID
     * @param string $domain
     * @param string $type Publication type
     * @param string $template Publication template
     * @return array
     */
    public function execute(int $id, string $domain, string $type, string $template = 'default'): array
    {
        $this->log->info('publication:container:info', [
            'id' => $id,
            'domain' => $domain,
            'type' => $type,
            'template' => $template
        ]);

        $info = [
            'domain' => $domain,
            'image' => 'publication/' . $type . ':' . $template,
            'env' => json_encode([
                'PUBLICATION_TYPE' => $type,
                'PUBLICATION_TEMPLATE' => $template,
            ]),
        ];

        $this->log->debug('publication:container:info', ['info' => $info]);

        return $info;
    }
}
