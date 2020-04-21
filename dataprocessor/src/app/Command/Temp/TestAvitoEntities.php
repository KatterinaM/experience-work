<?php /** @noinspection PhpComposerExtensionStubsInspection */

namespace App\Command\Temp;

use App\Command\AbstractCommand;
use App\Service\Avito\FeedGeneratorServiceInterface;
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
class TestAvitoEntities extends AbstractCommand
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
    protected $serializer;

    /**
     * QueueGet constructor.
     * @param LoggerInterface $log
     * @param FeedGeneratorServiceInterface $generator
     * @param SerializerInterface $serializer
     */
    public function __construct(LoggerInterface $log, FeedGeneratorServiceInterface $generator, SerializerInterface $serializer)
    {
        parent::__construct('test:avito', 'Test Avito entities');

        $this
            ->usage('<bold>test:avito</end><eol/>');

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
        $this->log->info('test:avito', ['Generating feed data...']);
        $ads = $this->generator->generateFeed();

        // Validate feed
        $this->log->info('test:avito', ['Validating feed data...']);
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(new AnnotationReader())
            ->getValidator();

        /** @var ConstraintViolationList $violations */
        $violations = $validator->validate($ads);

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
            $this->log->info('test:avito', ['Serializing feed data...']);
            $context = new SerializationContext();
            $context->setSerializeNull(false);

            $xml = $this->serializer->serialize($ads, 'xml', $context);

            $this->log->info('test:avito', ['Writing feed to file', 'avito-feed.xml']);

            file_put_contents('avito-feed.xml', $xml);

            $this->log->info('test:avito', ['Done']);
        }
    }
}
