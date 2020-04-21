<?php

namespace App\Entity\Cian;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class RoomDefinitions
 * @package App\Entity\Cian
 */
class RoomDefinitions
{
    /**
     * @var RoomArea
     * @Serializer\SerializedName("Room")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\RoomDefinitions")
     */
    private $roomArea;

    /**
     * @return RoomArea
     */
    public function getRoomArea(): RoomArea
    {
        return $this->roomArea;
    }

    /**
     * @param RoomArea $roomArea
     */
    public function setRoomArea(RoomArea $roomArea): void
    {
        $this->roomArea = $roomArea;
    }
}