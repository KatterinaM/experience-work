<?php


namespace App\Service\Publication\API;

use App\Entity\Publication\API\Publication;
use App\Entity\Publication\API\Response;
use Closure;
use Exception as Exception;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use App\Service\Publication\PublicationServiceInterface;
use App\Service\Publication\PublicationServiceException;

/**
 * Class PublicationClientService
 * @package App\Service\PublicationClient
 */
class PublicationAPIService implements PublicationServiceInterface
{
    const API_GET_PUBLICATION_LIST_URI = 'Publications/getList';
    const API_GET_PUBLICATION_URI = 'Publications/getById';

    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * PublicationClientService constructor.
     * @param LoggerInterface $log
     * @param SerializerInterface $serializer
     * @param HttpClientInterface $client
     */
    public function __construct(LoggerInterface $log, SerializerInterface $serializer, HttpClientInterface $client)
    {
        $this->log = $log;
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Retrive publication data from API (including publication objects)
     * @return Publication[]|null
     * @throws GuzzleException
     * @throws PublicationServiceException
     */
    public function getPublicationList(): ?array
    {
        $url = $this->getMethodUrl(self::API_GET_PUBLICATION_LIST_URI);

        $list = $this->runApiRequest($url, function ($data) {
            $response = $this->deserializeApiResponse($data);
            return $response->items;
        });

        return $list;
    }

    /**
     * Retrive publication data from API (including publication objects)
     * @param int $id
     * @return Publication|null
     * @throws GuzzleException
     * @throws PublicationServiceException
     */
    public function getPublicationData(int $id): ?Publication
    {
        $url = $this->getMethodUrl(self::API_GET_PUBLICATION_URI);

        /** @var Publication $publication */
        $publication = $this->runApiRequest($url . '?id=' . $id, function ($data) use ($id) {
            $response = $this->deserializeApiResponse($data);
            return reset($response->items);
        });

        return $publication;
    }

    /**
     * Generate API request URL
     * @param string $method
     * @return string
     */
    private function getMethodUrl(string $method): string
    {
        return getenv('PUBLICATION_API_BASE_URL') . $method;
    }

    /**
     * @param string $url
     * @param Closure $callback
     * @return mixed
     * @throws GuzzleException
     */
    private function runApiRequest(string $url, Closure $callback)
    {
        try {
            // Make API request
            $response = $this->client->request('GET', $url);

            // Check status code
            $statusCode = $response->getStatusCode();
            if ($statusCode !== 200) {
                throw new PublicationServiceException('Got invalid HTTP status code from API', $statusCode);
            }

            // Get body and deserialize into entities
            $data = $response->getBody()->getContents();

            return $callback->call($this, $data);
        } catch (Exception $e) {
            throw new PublicationServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param $data
     * @return Response
     */
    private function deserializeApiResponse($data): Response
    {
        /** @var Response $response */
        $response = $this->serializer->deserialize($data, Response::class, 'json');
        if (empty($response) || !$response->success || !is_array($response->items)) {
            throw new PublicationServiceException('Got invalid response from API');
        }
        return $response;
    }
}
