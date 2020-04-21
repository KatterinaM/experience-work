<?php

namespace App\Service\Avito;

use App\Entity\Avito\Ads;

/**
 * Interface FeedGeneratorServiceInterface
 * @package App\Service\Avito
 */
interface FeedGeneratorServiceInterface
{
    /**
     * Generates and returns XML feed
     * @return Ads
     */
    public function generateFeed(): ?Ads;
}
