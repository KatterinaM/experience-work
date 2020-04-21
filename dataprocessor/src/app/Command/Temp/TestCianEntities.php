<?php /** @noinspection PhpComposerExtensionStubsInspection */

namespace App\Command\Temp;

use App\Command\AbstractCommand;
use App\Service\Cian\FeedGeneratorServiceInterface;
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
class TestCianEntities extends AbstractCommand
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
        parent::__construct('test:cian', 'Test Cian entities');

        $this
            ->usage('<bold>test:cian</end><eol/>');

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
        $this->log->info('test:cian', ['Generating feed data...']);

        $ads = $this->generator->generateFeed();

        // Validate feed
        $this->log->info('test:cian', ['Validating feed data...']);
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
            $this->log->info('test:cian', ['Serializing feed data...']);
            $context = new SerializationContext();
            $context->setSerializeNull(false);

            $xml = $this->serializer->serialize($ads, 'xml', $context);

            $this->log->info('test:cian', ['Writing feed to file', 'cian-feed.xml']);

            file_put_contents('cian-feed.xml', $xml);

            $this->log->info('test:cian', ['Done']);
        }
    }

}