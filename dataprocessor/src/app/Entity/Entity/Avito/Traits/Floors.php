<?php

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait Rooms
 * @package App\Entity\Avito\Traits
 */
trait Floors
{
    /**
     * @var int
     * @SerializedName("Floor")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\GreaterThan(0)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\Floors", "validateFloor" })
     */
    private $floor;

    /**
     * @var int
     * @SerializedName("Floors")
     * @SkipWhenEmpty
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     * @Constraints\GreaterThan(0)
     */
    private $floors;

    /**
     * @return int
     */
    public function getFloor(): int
    {
        return $this->floor;
    }

    /**
     * @param int $floor
     */
    public function setFloor(int $floor): void
    {
        $this->floor = $floor;
    }

    /**
     * @return int
     */
    public function getFloors(): ?int
    {
        return $this->floors;
    }

    /**
     * @param int $floors
     */
    public function setFloors(int $floors): void
    {
        $this->floors = $floors;
    }

    /**
     * @param mixed $floor
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateFloor(
        $floor,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        $floors = $object->getFloors();
        if ($floor > $floors) {
            $context->buildViolation(
                'Номер этажа (' . $floor . ') '.
                'больше количества этажей (' . $floors . ').'
            )->addViolation();
        }
    }
}
