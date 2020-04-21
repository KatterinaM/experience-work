<?php  /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;

/**
 * Trait Rooms
 * @package App\Entity\Avito\Traits
 */
trait Rooms
{
    /**
     * @var int
     * @SerializedName("Rooms")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     * @Constraints\GreaterThan(0)
     */
    private $rooms;

    /**
     * @return int
     */
    public function getRooms(): int
    {
        return $this->rooms;
    }

    /**
     * @param int $rooms
     */
    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }
}
