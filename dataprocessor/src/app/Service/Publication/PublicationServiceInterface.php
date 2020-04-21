<?php

namespace App\Service\Publication;


use App\Entity\Publication\API\Publication;

/**
 * Interface PublicationServiceInterface
 * @package App\Service\PublicationClient
 */
interface PublicationServiceInterface
{
    /**
     * Retrive publication data from API (including publication objects)
     * @param int $id
     * @return Publication|null
     * @throws DockerException
     */
    public function getPublicationData(int $id): ?Publication;

    /**
     * Retrive publication data from API (including publication objects)
     * @return Publication[]|null
     * @throws GuzzleException
     * @throws PublicationServiceException
     */
    public function getPublicationList(): ?array;
}
