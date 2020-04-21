<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Bet
 * @package App\Entity\Cian
 */
class Bet
{
    /**
     * @var double
     * @Serializer\SerializedName("Bet")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $bet;

    /**
     * @return float
     */
    public function getBet(): float
    {
        return $this->bet;
    }

    /**
     * @param float $bet
     */
    public function setBet(float $bet): void
    {
        $this->bet = $bet;
    }
}