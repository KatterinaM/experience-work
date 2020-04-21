<?php

namespace App\Entity\Cian\Base;

use App\Entity\Cian\Terms;
use App\Entity\Cian\RentByPartsSchema;
use App\Entity\Cian\ExtraData;
use App\Entity\Cian\Bet;
use App\Entity\Cian\PhoneSchema;
use App\Entity\Cian\SubAgent;
use App\Entity\Cian\Coordinates;
use App\Entity\Cian\Highway;
use App\Entity\Cian\UndergroundInfoSchema;
use App\Entity\Cian\LayoutPhoto;
use App\Entity\Cian\PhotoSchema;
use App\Entity\Cian\VideoSchema;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class AbstractObject
 * @package App\Entity\Cian\Base
 *
 */
abstract class AbstractObject
{
    /**
     * @var string
     * @Serializer\SerializedName("ExternalId")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     */
    private $externalId;

    /**
     * @var string
     * @Serializer\SerializedName("Description")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     */
    private $description;

    /**
     * @var string
     * @Serializer\SerializedName("Address")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotBlank()
     */
    private $address;

    /**
     * @var string
     * @Serializer\SerializedName("Title")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\AbstractObject", "validateTitle" })
     */
    private $title;

    /**
     * @var bool
     * @Serializer\SerializedName("IsRentByParts")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $isRentByParts;

    /**
     * @var string
     * @Serializer\SerializedName("RentByPartsDescription")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $rentByPartsDescription;

    /**
     * @var RentByPartsSchema
     * @Serializer\SerializedName("AreaParts")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\RentByPartsSchema")
     * @Constraints\Valid()
     */
    private $areaParts;

    /**
     * @var Terms
     * @Serializer\SerializedName("PublishTerms")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Terms")
     * @Constraints\Valid()
     */
    private $publishTerms;

    /**
     * @var ExtraData
     * @Serializer\SerializedName("ExtraData")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\ExtraData")
     * @Constraints\Valid()
     */
    private $extraData;

    /**
     * @var Bet
     * @Serializer\SerializedName("Auction")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Bet")
     * @Constraints\Valid()
     */
    private $auction;

    /**
     * @var bool
     * @Serializer\SerializedName("IsInHiddenBase")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     */
    private $isInHiddenBase;

    /**
     * @var PhoneSchema
     * @Serializer\SerializedName("Phones")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Cian\PhoneSchema")
     * @Constraints\Valid()
     */
    private $phones;

    /**
     * @var SubAgent
     * @Serializer\SerializedName("SubAgent")
     * @Serializer\XmlElement(cdata=false)
     * @Constraints\NotNull()
     * @Constraints\Type("App\Entity\Cian\SubAgent")
     * @Constraints\Valid()
     */
    private $subAgent;

    /**
     * @var Coordinates
     * @Serializer\SerializedName("Coordinates")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Coordinates")
     * @Constraints\Valid()
     */
    private $coordinates;

    /**
     * @var string
     * @Serializer\SerializedName("CadastralNumber")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Callback({ "App\Entity\Cian\Base\AbstractObject", "validateCadastralNumber" })
     */
    private $cadastralNumber;

    /**
     * @var Highway
     * @Serializer\SerializedName("Highway")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\Highway")
     * @Constraints\Valid()
     */
    private $highway;

    /**
     * @var UndergroundInfoSchema
     * @Serializer\SerializedName("Undergrounds")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\UndergroundInfoSchema")
     * @Constraints\Valid()
     */
    private $undergrounds;

    /**
     * @var LayoutPhoto
     * @Serializer\SerializedName("LayoutPhoto")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\LayoutPhoto")
     * @Constraints\Valid()
     */
    private $layoutPhoto;

    /**
     * @var PhotoSchema
     * @Serializer\SerializedName("Photos")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\PhotoSchema")
     * @Constraints\Valid()
     */
    private $photos;

    /**
     * @var VideoSchema
     * @Serializer\SerializedName("Videos")
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty
     * @Constraints\Type("App\Entity\Cian\VideoSchema")
     * @Constraints\Valid()
     */
    private $videos;

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @param string $externalId
     */
    public function setExternalId(string $externalId): void
    {
        $this->externalId = $externalId;
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
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isRentByParts(): bool
    {
        return $this->isRentByParts;
    }

    /**
     * @param bool $isRentByParts
     */
    public function setIsRentByParts(bool $isRentByParts): void
    {
        $this->isRentByParts = $isRentByParts;
    }

    /**
     * @return string
     */
    public function getRentByPartsDescription(): string
    {
        return $this->rentByPartsDescription;
    }

    /**
     * @param string $rentByPartsDescription
     */
    public function setRentByPartsDescription(string $rentByPartsDescription): void
    {
        $this->rentByPartsDescription = $rentByPartsDescription;
    }

    /**
     * @return RentByPartsSchema
     */
    public function getAreaParts(): RentByPartsSchema
    {
        return $this->areaParts;
    }

    /**
     * @param RentByPartsSchema $areaParts
     */
    public function setAreaParts(RentByPartsSchema $areaParts): void
    {
        $this->areaParts = $areaParts;
    }

    /**
     * @return Terms
     */
    public function getPublishTerms(): Terms
    {
        return $this->publishTerms;
    }

    /**
     * @param Terms $publishTerms
     */
    public function setPublishTerms(Terms $publishTerms): void
    {
        $this->publishTerms = $publishTerms;
    }


    /**
     * @return ExtraData
     */
    public function getExtraData(): ExtraData
    {
        return $this->extraData;
    }

    /**
     * @param ExtraData $extraData
     */
    public function setExtraData(ExtraData $extraData): void
    {
        $this->extraData = $extraData;
    }

    /**
     * @return Bet
     */
    public function getAuction(): Bet
    {
        return $this->auction;
    }

    /**
     * @param Bet $auction
     */
    public function setAuction(Bet $auction): void
    {
        $this->auction = $auction;
    }

    /**
     * @return bool
     */
    public function isInHiddenBase(): bool
    {
        return $this->isInHiddenBase;
    }

    /**
     * @param bool $isInHiddenBase
     */
    public function setIsInHiddenBase(bool $isInHiddenBase): void
    {
        $this->isInHiddenBase = $isInHiddenBase;
    }

    /**
     * @return PhoneSchema
     */
    public function getPhones(): PhoneSchema
    {
        return $this->phones;
    }

    /**
     * @param PhoneSchema $phones
     */
    public function setPhones(PhoneSchema $phones): void
    {
        $this->phones = $phones;
    }

    /**
     * @return SubAgent
     */
    public function getSubAgent(): SubAgent
    {
        return $this->subAgent;
    }

    /**
     * @param SubAgent $subAgent
     */
    public function setSubAgent(SubAgent $subAgent): void
    {
        $this->subAgent = $subAgent;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates $coordinates
     */
    public function setCoordinates(Coordinates $coordinates): void
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getCadastralNumber(): string
    {
        return $this->cadastralNumber;
    }

    /**
     * @param string $cadastralNumber
     */
    public function setCadastralNumber(string $cadastralNumber): void
    {
        $this->cadastralNumber = $cadastralNumber;
    }

    /**
     * @return Highway
     */
    public function getHighway(): Highway
    {
        return $this->highway;
    }

    /**
     * @param Highway $highway
     */
    public function setHighway(Highway $highway): void
    {
        $this->highway = $highway;
    }

    /**
     * @return UndergroundInfoSchema
     */
    public function getUndergrounds(): UndergroundInfoSchema
    {
        return $this->undergrounds;
    }

    /**
     * @param UndergroundInfoSchema $undergrounds
     */
    public function setUndergrounds(UndergroundInfoSchema $undergrounds): void
    {
        $this->undergrounds = $undergrounds;
    }

    /**
     * @return LayoutPhoto
     */
    public function getLayoutPhoto(): LayoutPhoto
    {
        return $this->layoutPhoto;
    }

    /**
     * @param LayoutPhoto $layoutPhoto
     */
    public function setLayoutPhoto(LayoutPhoto $layoutPhoto): void
    {
        $this->layoutPhoto = $layoutPhoto;
    }

    /**
     * @return PhotoSchema
     */
    public function getPhotos(): PhotoSchema
    {
        return $this->photos;
    }

    /**
     * @param PhotoSchema $photos
     */
    public function setPhotos(PhotoSchema $photos): void
    {
        $this->photos = $photos;
    }

    /**
     * @return VideoSchema
     */
    public function getVideos(): VideoSchema
    {
        return $this->videos;
    }

    /**
     * @param VideoSchema $videos
     */
    public function setVideos(VideoSchema $videos): void
    {
        $this->videos = $videos;
    }

    /**
     * @param mixed $title
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateTitle(
        $title,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ){
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if(!is_null($title) && (iconv_strlen($title) < 8 || iconv_strlen($title) > 33)){
            $context->buildViolation('Заголовок должен быть больше 8 символов, но меньше 33 символов')
                ->addViolation();
        }
    }

    /**
     * @param mixed $cadastralNumber
     * @param ExecutionContextInterface $context
     * @param mixed $payload
     */
    public static function validateCadastralNumber(
        $cadastralNumber,
        ExecutionContextInterface $context,
        /** @noinspection PhpUnusedParameterInspection */
        $payload
    ) {
        /** @var AbstractObject $object */
        $object = $context->getObject();

        if (!is_null($cadastralNumber) && !preg_match('/^\d{2}:\d{2}:\d{6,7}:\d{1,35}$/', $cadastralNumber)) {
            $context->buildViolation('Неверный формат кадастрового номера')
                ->addViolation();
        }
    }
}