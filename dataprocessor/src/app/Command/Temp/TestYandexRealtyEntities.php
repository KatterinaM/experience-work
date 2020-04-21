<?php /** @noinspection PhpComposerExtensionStubsInspection */

namespace App\Command\Temp;

use App\Command\AbstractCommand;
use App\Service\Yandex\Realty\FeedGeneratorServiceInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

/**
 * Class QueueGet
 * @package App\Command
 */
class TestYandexRealtyEntities extends AbstractCommand
{
    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var FeedGeneratorServiceInterface
     */
    private $generator;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * QueueGet constructor.
     * @param LoggerInterface $log
     * @param FeedGeneratorServiceInterface $generator
     * @param SerializerInterface $serializer
     */
    public function __construct(LoggerInterface $log, FeedGeneratorServiceInterface $generator, SerializerInterface $serializer)
    {
        parent::__construct('test:yandex-realty', 'Test Yandex realty entities');

        $this
            ->usage('<bold>test:yandex-realty</end><eol/>');

        $this->log = $log;
        $this->generator = $generator;
        $this->serializer = $serializer;
    }

    /**
     * Send message to specified queue
     * @return void
     * @throws Exception
     */
    public function execute(): void
    {
        $this->log->info('test:yandex-realty', ['Generating feed data...']);
        $feed = $this->generator->generateFeed();

        // Validate feed
        $this->log->info('test:yandex-realty', ['Validating feed data...']);
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();

        /** @var ConstraintViolationList $violations */
        $violations = $validator->validate($feed);

        if ($violations->count() > 0) {
            // Display violations
            /** @var ConstraintViolation $violation */
            foreach ($violations as $violation) {
                $this->writer()->error(
                    $violation->getPropertyPath()
                    . ' - ' . $violation->getMessage()
                    . ' - ' . $violation->getInvalidValue(),
                    true
                );
            }
        } else {
            // Serialize ads to XML
            $this->log->info('test:yandex-realty', ['Serializing feed data...']);
            $context = new SerializationContext();
            $context->setSerializeNull(false);

            $xml = $this->serializer->serialize($feed, 'xml', $context);

            $this->log->info('test:yandex-realty', ['Writing feed to file', 'yandex-realty-feed.xml']);
            file_put_contents('yandex-realty-feed.xml', $xml);

            $this->log->info('test:yandex-realty', ['Done']);
        }
    }
}
