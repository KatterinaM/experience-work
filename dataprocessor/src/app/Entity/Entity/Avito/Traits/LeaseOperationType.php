<?php /** @noinspection PhpUnusedAliasInspection */

namespace App\Entity\Avito\Traits;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Avito\Base\PropertyRightsInterface;
use App\Entity\Avito\Option;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Trait LeaseOperationType
 * @package App\Entity\Avito\Traits
 */
trait LeaseOperationType
{
    use BaseOperationType;

    /**
     * @var string
     * @SerializedName("LeaseType")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseType" })
     */
    private $leaseType;

    /**
     * @var int
     * @SerializedName("LeaseBeds")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $leaseBeds;

    /**
     * @var int
     * @SerializedName("LeaseSleepingPlaces")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $leaseSleepingPlaces;

    /**
     * @var array<Option>
     * @SerializedName("LeaseMultimedia")
     * @XmlList(inline = false, entry = "Option")
     * @SkipWhenEmpty
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Avito\Option")
     * })
     * @Constraints\Callback(
     *     callback = { "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseOptions" },
     *     payload = \App\Entity\Avito\Base\ObjectTypeInterface::LEASE_MULTIMEDIA_OPTIONS
     * )
     */
    private $leaseMultimedia = [];

    /**
     * @var array<Option>
     * @SerializedName("LeaseAppliances")
     * @XmlList(inline = false, entry = "Option")
     * @SkipWhenEmpty
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Avito\Option")
     * })
     * @Constraints\Callback(
     *     callback = { "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseOptions" },
     *     payload = \App\Entity\Avito\Base\ObjectTypeInterface::LEASE_APPLIANCES_OPTIONS
     * )
     */
    private $leaseAppliances = [];

    /**
     * @var array<Option>
     * @SerializedName("LeaseComfort")
     * @XmlList(inline = false, entry = "Option")
     * @SkipWhenEmpty
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Avito\Option")
     * })
     * @Constraints\Callback(
     *     callback = { "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseOptions" },
     *     payload = \App\Entity\Avito\Base\ObjectTypeInterface::LEASE_COMFORT_OPTIONS
     * )
     */
    private $leaseComfort = [];

    /**
     * @var array<Option>
     * @SerializedName("LeaseAdditionally")
     * @XmlList(inline = false, entry = "Option")
     * @SkipWhenEmpty
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Avito\Option")
     * })
     * @Constraints\Callback(
     *     callback = { "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseOptions" },
     *     payload = \App\Entity\Avito\Base\ObjectTypeInterface::LEASE_ADDITIONALLY_OPTIONS
     * )
     */
    private $leaseAdditionally = [];

    /**
     * @var int
     * @SerializedName("LeaseCommissionSize")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseCommissionSize" })
     */
    private $leaseCommissionSize;

    /**
     * @var string
     * @SerializedName("LeaseDeposit")
     * @XmlElement(cdata=false)
     * @Constraints\Callback({ "App\Entity\Avito\Traits\LeaseOperationType", "validateLeaseDeposit" })
     */
    private $leaseDeposit;

    /**
     * @return string|null
     */
    public function getLeaseType(): ?string
    {
        return $this->leaseType;
    }

    /**
     * @param string $leaseType
     */
    public function setLeaseType(string $leaseType): void
    {
        $this->leaseType = $leaseType;
    }

    /**
     * @return int
     */
    public function getLeaseBeds(): int
    {
        return $this->leaseBeds;
    }

    /**
     * @param int $leaseBeds
     */
    public function setLeaseBeds(int $leaseBeds): void
    {
        $this->leaseBeds = $leaseBeds;
    }

    /**
     * @return int
     */
    public function getLeaseSleepingPlaces(): int
    {
        return $this->leaseSleepingPlaces;
    }

    /**
     * @param int $leaseSleepingPlaces
     */
    public function setLeaseSleepingPlaces(int $leaseSleepingPlaces): void
    {
        $this->leaseSleepingPlaces = $leaseSleepingPlaces;
    }

    /**
     * @return array<Option>
     */
    public function getLeaseMultimedia(): array
    {
        return $this->leaseMultimedia;
    }

    /**
     * @param array<string> $options
     */
    public function setLeaseMultimedia(array $options): void
    {
        $this->leaseMultimedia = $this->convertStringsToOptions($options);
    }

    /**
     * @return array<Option>
     */
    public function getLeaseAppliances(): array
    {
        return $this->leaseAppliances;
    }

    /**
     * @param array<string> $options
     */
    public function setLeaseAppliances(array $options): void
    {
        $this->leaseAppliances = $this->convertStringsToOptions($options);
    }

    /**
     * @return array<Option>
     */
    public function getLeaseComfort(): array
    {
        return $this->leaseComfort;
    }

    /**
     * @param array<string> $options
     */
    public function setLeaseComfort(array $options): void
    {
        $this->leaseComfort = $this->convertStringsToOptions($options);
    }

    /**
     * @return array<Option>
     */
    public function getLeaseAdditionally(): array
    {
        return $this->leaseAdditionally;
    }

    /**
     * @param array<string> $options
     */
    public function setLeaseAdditionally(array $options): void
    {
        $this->leaseAdditionally = $this->convertStringsToOptions($options);
    }

    /**
     * @return int
     */
    public function getLeaseCommissionSize(): int
    {
        return $this->leaseCommissionSize;
    }

    /**
     * @param int $leaseCommissionSize
     */
    public function setLeaseCommissionSize(int $leaseCommissionSize): void
    {
        $this->leaseCommissionSize = $leaseCommissionSize;
    }

    /**
     * @return string
     */
    public function getLeaseDeposit(): string
    {
        return $this->leaseDeposit;
    }

    /**
     * @param string $leaseDeposit
     */
    public function setLeaseDeposit(string $leaseDeposit): void
    {
        $this->leaseDeposit = $leaseDeposit;
    }

    /**
     * @VirtualProperty
     * @SerializedName("OperationType")
     * @XmlElement(cdata=false)
     * @return string
     */
    public function getOperationType(): string
    {
        return OperationTypeInterface::OPERATION_TYPE_LEASE;
    }

    /**
     * @param mixed $leaseOptions
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateLeaseOptions(
        $leaseOptions,
        ExecutionContextInterface $context,
        $payload
    ) {
        $invalidOptions = array_diff($leaseOptions, $payload);
        if (!empty($invalidOptions)) {
            $context->buildViolation(
                'Неизвестные опции: "'
                . implode('"", "', $invalidOptions) . '. '
                . 'Допустимые опции: '
                . implode('"", "', $payload) . '. '
            )->addViolation();
        }
    }

    /**
     * @param mixed $leaseCommissionSize
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateLeaseCommissionSize(
        $leaseCommissionSize,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Поле обязательно для долгосрочной аренды в случае права собственности "Посредник"
        if ($object->getLeaseType() == OperationTypeInterface::LEASE_TYPE_LONG
            && $object->getPropertyRights() == PropertyRightsInterface::PROPERTY_RIGHTS_MEDIATOR
            && is_null($leaseCommissionSize)
        ) {
            $context->buildViolation(
                'Поле обязательно для долгосрочной аренды в случае права собственности "Посредник"'
            )->addViolation();
        }
    }

    /**
     * @param mixed $leaseDeposit
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateLeaseDeposit(
        $leaseDeposit,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        // Поле обязательно для долгосрочной аренды
        if ($object->getLeaseType() == OperationTypeInterface::LEASE_TYPE_LONG
            && empty($leaseDeposit)
        ) {
            $context->buildViolation('Поле обязательно для долгосрочной аренды')
                ->addViolation();
        }
    }

    /**
     * @param mixed $leaseType
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateLeaseType(
        $leaseType,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        /*
         * Обязательно для типа (OperationType) "Сдам" в категориях:
         * - Квартиры
         * - Комнаты
         * - Дома, дачи, коттеджи
         * - Недвижимость за рубежом
         */
        if (in_array($object->getCategory(), [
                AbstractAd::CATEGORY_APARTMENTS,
                AbstractAd::CATEGORY_ROOMS,
                AbstractAd::CATEGORY_COTTAGES,
                AbstractAd::CATEGORY_FOREIGN,
            ])
            && is_null($leaseType)
        ) {
            $context->buildViolation(
                'Обязательно для типа (OperationType) "Сдам" в категориях: '
                . '"Квартиры", '
                . '"Комнаты", '
                . '"Дома, дачи, коттеджи", '
                . '"Недвижимость за рубежом" '
            )->addViolation();
        }

        // Может принимать одно из значений
        if (!is_null($leaseType)
            && $leaseType != OperationTypeInterface::LEASE_TYPE_LONG
            && $leaseType != OperationTypeInterface::LEASE_TYPE_DAILY
        ) {
            $context->buildViolation('Поле ожет принимать одно из значений: "На длительный срок", "Посуточно"')
                ->addViolation();
        }
    }

    /**
     * @param array<Option> $options
     * @return array
     */
    private function convertStringsToOptions(array $options)
    {
        return array_map(function (string $value) {
            return new Option($value);
        }, $options);
    }
}
