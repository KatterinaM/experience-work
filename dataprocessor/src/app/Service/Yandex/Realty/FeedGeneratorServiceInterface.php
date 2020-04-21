<?php

namespace App\Service\Yandex\Realty;

use App\Entity\Yandex\Realty\RealtyFeed;

/**
 * Interface FeedGeneratorServiceInterface
 * @package App\Service\Yandex\Realty
 */
interface FeedGeneratorServiceInterface
{
    /**
     * Generates and returns XML feed
     * @return RealtyFeed
     */
    public function generateFeed(): ?RealtyFeed;
}
