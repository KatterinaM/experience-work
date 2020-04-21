<?php

namespace App\Entity\Yandex\Realty;

use App\Entity\Yandex\Realty\Base\AbstractOffer;
use App\Entity\Yandex\Realty\Traits\Building;
use App\Entity\Yandex\Realty\Traits\Premise;
use App\Entity\Yandex\Realty\Traits\Warehouse;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

/**
 * Class Offer
 * @package App\Entity\Yandex\Realty
 */
class CommercialOffer extends AbstractOffer
{
    use Premise;
    use Building;
    use Warehouse;

    const COMMERCIAL_TYPE_AUTO_REPAIR = 'auto repair';
    const COMMERCIAL_TYPE_BUSINESS = 'business';
    const COMMERCIAL_TYPE_FREE_PURPOSE = 'free purpose';
    const COMMERCIAL_TYPE_HOTEL = 'hotel';
    const COMMERCIAL_TYPE_LAND = 'land';
    const COMMERCIAL_TYPE_LEGAL_ADDRESS = 'legal address';
    const COMMERCIAL_TYPE_MANUFACTURING = 'manufacturing';
    const COMMERCIAL_TYPE_OFFICE = 'office';
    const COMMERCIAL_TYPE_PUBLIC_CATERING = 'public catering';
    const COMMERCIAL_TYPE_RETAIL = 'retail';
    const COMMERCIAL_TYPE_WAREHOUSE = 'warehouse';

    const COMMERCIAL_TYPES = [
        self::COMMERCIAL_TYPE_AUTO_REPAIR,
        self::COMMERCIAL_TYPE_BUSINESS,
        self::COMMERCIAL_TYPE_FREE_PURPOSE,
        self::COMMERCIAL_TYPE_HOTEL,
        self::COMMERCIAL_TYPE_LAND,
        self::COMMERCIAL_TYPE_LEGAL_ADDRESS,
        self::COMMERCIAL_TYPE_MANUFACTURING,
        self::COMMERCIAL_TYPE_OFFICE,
        self::COMMERCIAL_TYPE_PUBLIC_CATERING,
        self::COMMERCIAL_TYPE_RETAIL,
        self::COMMERCIAL_TYPE_WAREHOUSE,
    ];

    const BUILDING_TYPE_BUSINESS_CENTER = 'business center';
    const BUILDING_TYPE_DETACHED_BUILDING = 'detached building';
    const BUILDING_TYPE_RESIDENTIAL_BUILDING = 'residential building';
    const BUILDING_TYPE_SHOPPING_CENTER = 'shopping center';
    const BUILDING_TYPE_WAREHOUSE = 'warehouse';

    const BUILDING_TYPES = [
        self::BUILDING_TYPE_BUSINESS_CENTER,
        self::BUILDING_TYPE_DETACHED_BUILDING,
        self::BUILDING_TYPE_RESIDENTIAL_BUILDING,
        self::BUILDING_TYPE_SHOPPING_CENTER,
        self::BUILDING_TYPE_WAREHOUSE,
    ];

    const PURPOSE_BANK = 'bank';
    const PURPOSE_BEAUTY_SHOP = 'beauty shop';
    const PURPOSE_FOOD_STORE = 'food store';
    const PURPOSE_MEDICAL_CENTER = 'medical center';
    const PURPOSE_SHOW_ROOM = 'show room';
    const PURPOSE_TOURAGENCY = 'touragency';

    const PURPOSES = [
        self::PURPOSE_BANK,
        self::PURPOSE_BEAUTY_SHOP,
        self::PURPOSE_FOOD_STORE,
        self::PURPOSE_MEDICAL_CENTER,
        self::PURPOSE_SHOW_ROOM,
        self::PURPOSE_TOURAGENCY,
    ];

    const PURPOSES_WAREHOUSE_ALCOHOL = 'alcohol';
    const PURPOSES_WAREHOUSE_PHARMACEUTICAL_STOREHOUSE = 'pharmaceutical storehouse';
    const PURPOSES_WAREHOUSE_VEGETABLE_STOREHOUSE = 'vegetable storehouse';

    const PURPOSES_WAREHOUSE = [
        self::PURPOSES_WAREHOUSE_ALCOHOL,
        self::PURPOSES_WAREHOUSE_PHARMACEUTICAL_STOREHOUSE,
        self::PURPOSES_WAREHOUSE_VEGETABLE_STOREHOUSE,
    ];

    const RENOVATION_DESIGNER = 'дизайнерский';
    const RENOVATION_EURO = 'евро';
    const RENOVATION_NONE = 'требует ремонта';
    const RENOVATION_FINE = 'хороший';
    const RENOVATION_PARTIAL = 'частичный ремонт';
    const RENOVATION_HAS_FACING = 'с отделкой';
    const RENOVATION_ROUGH_FACING = 'черновая отделка';

    const RENOVATIONS = [
        self::RENOVATION_DESIGNER,
        self::RENOVATION_EURO,
        self::RENOVATION_NONE,
        self::RENOVATION_FINE,
        self::RENOVATION_PARTIAL,
        self::RENOVATION_HAS_FACING,
        self::RENOVATION_ROUGH_FACING,
    ];

    const QUALITY_FINE = 'отличное';
    const QUALITY_GOOD = 'хорошее';
    const QUALITY_NORMAL = 'нормальное';
    const QUALITY_BAD = 'плохое';

    const QUALITIES = [
        self::QUALITY_FINE,
        self::QUALITY_GOOD,
        self::QUALITY_NORMAL,
        self::QUALITY_BAD,
    ];

    /**
     * @var string
     * @Serializer\SerializedName("commercial-type")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::COMMERCIAL_TYPES)
     */
    private $commercialType;

    /**
     * @var string
     * @Serializer\SerializedName("commercial-building-type")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::BUILDING_TYPES)
     */
    private $commercialBuildingType;

    /**
     * @var string
     * @Serializer\SerializedName("purpose")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::PURPOSES)
     */
    private $purpose;

    /**
     * @var string
     * @Serializer\SerializedName("purpose-warehouse")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::PURPOSES_WAREHOUSE)
     */
    private $purposeWarehouse;

    /**
     * @var SalesAgent
     * @Serializer\SerializedName("sales-agent")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Yandex\Realty\SalesAgent")
     * @Constraints\Valid()
     */
    private $salesAgent;

    /**
     * @var Price
     * @Serializer\SerializedName("price")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Yandex\Realty\Price")
     * @Constraints\Valid()
     */
    private $price;

    /**
     * @var bool
     * @Serializer\SerializedName("rent-pledge")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("bool")
     */
    private $rentPledge;

    /**
     * @var Area
     * @Serializer\SerializedName("area")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Yandex\Realty\Area")
     * @Constraints\Valid()
     */
    private $area;

    /**
     * @var Image[]
     * @Serializer\XmlList(inline = true, entry = "image")
     * @Constraints\All({
     *     @Constraints\Type("\App\Entity\Yandex\Realty\Image")
     * })
     * @Constraints\Valid()
     */
    private $images;

    /**
     * @var string
     * @Serializer\SerializedName("renovation")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::RENOVATIONS)
     */
    private $renovation;

    /**
     * @var string
     * @Serializer\SerializedName("quality")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Choice(choices = \App\Entity\Yandex\Realty\CommercialOffer::QUALITIES)
     */
    private $quality;

    /**
     * @var string
     * @Serializer\SerializedName("description")
     * @Serializer\XmlElement(cdata=true)
     * @Serializer\SkipWhenEmpty()
     * @Constraints\Type("string")
     */
    private $description;

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("category")
     * @Serializer\XmlElement(cdata=false)
     * @return string
     */
    public function getCategory(): string
    {
        return self::CATEGORY_COMMERCIAL;
    }

    /**
     * @return string
     */
    public function getCommercialType(): string
    {
        return $this->commercialType;
    }

    /**
     * @param string $commercialType
     */
    public function setCommercialType(string $commercialType): void
    {
        $this->commercialType = $commercialType;
    }

    /**
     * @return string
     */
    public function getCommercialBuildingType(): string
    {
        return $this->commercialBuildingType;
    }

    /**
     * @param string $commercialBuildingType
     */
    public function setCommercialBuildingType(string $commercialBuildingType): void
    {
        $this->commercialBuildingType = $commercialBuildingType;
    }

    /**
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     */
    public function setPurpose(string $purpose): void
    {
        $this->purpose = $purpose;
    }

    /**
     * @return string
     */
    public function getPurposeWarehouse(): string
    {
        return $this->purposeWarehouse;
    }

    /**
     * @param string $purposeWarehouse
     */
    public function setPurposeWarehouse(string $purposeWarehouse): void
    {
        $this->purposeWarehouse = $purposeWarehouse;
    }

    /**
     * @return SalesAgent
     */
    public function getSalesAgent(): ?SalesAgent
    {
        return $this->salesAgent;
    }

    /**
     * @param SalesAgent $salesAgent
     */
    public function setSalesAgent(SalesAgent $salesAgent): void
    {
        $this->salesAgent = $salesAgent;
    }

    /**
     * @return Price
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isRentPledge(): bool
    {
        return $this->rentPledge;
    }

    /**
     * @param bool $rentPledge
     */
    public function setRentPledge(bool $rentPledge): void
    {
        $this->rentPledge = $rentPledge;
    }

    /**
     * @return Area
     */
    public function getArea(): ?Area
    {
        return $this->area;
    }

    /**
     * @param Area $area
     */
    public function setArea(Area $area): void
    {
        $this->area = $area;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Image[] $images
     */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getRenovation(): string
    {
        return $this->renovation;
    }

    /**
     * @param string $renovation
     */
    public function setRenovation(string $renovation): void
    {
        $this->renovation = $renovation;
    }

    /**
     * @return string
     */
    public function getQuality(): string
    {
        return $this->quality;
    }

    /**
     * @param string $quality
     */
    public function setQuality(string $quality): void
    {
        $this->quality = $quality;
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
}
