<?php

namespace App\Provider\Publication;

use App\Entity\Provider\Data\Publication;

/**
 * Interface PublicationProviderInterface
 * @package App\Provider\Publication
 */
interface PublicationProviderInterface
{
    /**
     * Get publication array
     * @return Publication[]
     */
    public function getPublications(): array;
}
