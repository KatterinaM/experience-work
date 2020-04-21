<?php

namespace App\Entity\Avito\Base;

use App\Entity\Avito\Traits\ContactInfo;
use DateTime;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\VirtualProperty;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlRoot;
use RuntimeException;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AbstractAd
 * @package App\Entity\Avito\Base
 * @XmlRoot("Ad")
 * @method getOperationType(): string
 * @method getPrice()
 * @method getPropertyRights(): string
 * @method getLeaseType(): string
 * @method getAvailableObjectTypes(): array
 * @method getAvailablePropertyRights(): array
 * @method getMarketType(): string
 * @method getObjectType(): string
 * @method getAvailableObjectSubtypes(string $objectType): array
 * @method getFloors()
 */
abstract class AbstractAd
{
    use ContactInfo;

    const CATEGORY_APARTMENTS = 'Квартиры';
    const CATEGORY_ROOMS = 'Комнаты';
    const CATEGORY_COTTAGES = 'Дома, дачи, коттеджи';
    const CATEGORY_LAND_PLOTS = 'Земельные участки';
    const CATEGORY_GARAGES = 'Гаражи и машиноместа';
    const CATEGORY_COMMERCIAL = 'Коммерческая недвижимость';
    const CATEGORY_FOREIGN = 'Недвижимость за рубежом';

    /**
     * @var int|string
     * @SerializedName("Id")
     * @XmlElement(cdata=false)
     * @Constraints\NotBlank
     */
    private $id;

    /**
     * @var DateTime Format: 2018-05-09T10:29:00+03:00
     * @SerializedName("DateBegin")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Type("\DateTime")
     */
    private $dateBegin;

    /**
     * @var DateTime Format: 2018-05-09T10:29:00+03:00
     * @SerializedName("DateEnd")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Avito\Base\AbstractAd", "validateDateEnd" })
     */
    private $dateEnd;

    /**
     * @var string Available values: "Package" (default), "PackageSingle", "Single"
     * @SerializedName("ListingFee")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $listingFee;

    /**
     * @var string Available values: "Free" (default), "Premium", "VIP", "PushUp", "Highlight", "TurboSale", "QuickSale"
     * @SerializedName("AdStatus")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $adStatus;

    /**
     * @var int
     * @SerializedName("AvitoId")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     */
    private $avitoId;

    /**
     * @var string
     * @SerializedName("Description")
     * @XmlElement(cdata=true)
     * @Constraints\NotBlank
     */
    private $description;

    /**
     * @var array<string>
     * @SerializedName("Images")
     * @XmlList(inline = false, entry = "Image")
     * @Constraints\NotNull
     * @Constraints\All({
     *     @Constraints\Type("App\Entity\Avito\Image")
     * })
     */
    private $images;

    /**
     * @var string
     * @SerializedName("VideoURL")
     * @XmlElement(cdata=false)
     * @SkipWhenEmpty
     * @Constraints\NotBlank(allowNull = true)
     */
    private $videoURL;

    /**
     * @VirtualProperty
     * @SerializedName("Category")
     * @XmlElement(cdata=false)
     * @return string
     */
    abstract public function getCategory(): string;

    /**
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime|null
     */
    public function getDateBegin(): ?DateTime
    {
        return $this->dateBegin;
    }

    /**
     * @param DateTime $dateBegin
     */
    public function setDateBegin(?DateTime $dateBegin): void
    {
        $this->dateBegin = $dateBegin;
    }

    /**
     * @return DateTime|null
     */
    public function getDateEnd(): ?DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param DateTime $dateEnd
     */
    public function setDateEnd(?DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return string
     */
    public function getListingFee(): string
    {
        return $this->listingFee;
    }

    /**
     * @param string $listingFee
     */
    public function setListingFee(?string $listingFee): void
    {
        $this->listingFee = $listingFee;
    }

    /**
     * @return string
     */
    public function getAdStatus(): string
    {
        return $this->adStatus;
    }

    /**
     * @param string $adStatus
     */
    public function setAdStatus(?string $adStatus): void
    {
        $this->adStatus = $adStatus;
    }

    /**
     * @return int
     */
    public function getAvitoId(): int
    {
        return $this->avitoId;
    }

    /**
     * @param int $avitoId
     */
    public function setAvitoId(?int $avitoId): void
    {
        $this->avitoId = $avitoId;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getVideoURL(): string
    {
        return $this->videoURL;
    }

    /**
     * @param string $videoURL
     */
    public function setVideoURL(?string $videoURL): void
    {
        $this->videoURL = $videoURL;
    }

    /**
     * @param $name
     * @param $value
     * @throws RuntimeException
     */
    public function __set($name, $value)
    {
        throw new RuntimeException("Unknown field [{$name}]");
    }

    /**
     * @param mixed $dateEnd
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateDateEnd(
        $dateEnd,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractAd $object */
        $object = $context->getObject();

        $dateBegin = $object->getDateBegin();
        if (!is_null($dateEnd) || !is_null($dateBegin)) {
            if ($dateEnd <= $dateBegin) {
                $context->buildViolation('Значение должно быть больше "dateBegin"')
                    ->addViolation();
            }
        }
    }
}
