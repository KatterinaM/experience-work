<?php

namespace App\Service\Cian;

use App\Entity\Cian\BaseObject;

/**
 * Interface FeedGeneratorServiceInterface
 * @package App\Service\Cian
 */
interface FeedGeneratorServiceInterface
{
    /**
     * Generates and returns XML feed
     * @return BaseObject
     */
    public function generateFeed(): ?BaseObject;
}