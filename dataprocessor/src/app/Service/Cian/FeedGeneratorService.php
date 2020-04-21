<?php

namespace App\Service\Cian;

use App\Entity\Cian\BargainTermsInfo;
use App\Entity\Cian\Base\CategoryInterface;
use App\Entity\Cian\Base\OwnershipInterface;
use App\Entity\Provider\Data\Publication;
use App\Entity\Cian;
use App\Provider\Publication\PublicationProviderInterface;
use Exception;
use Throwable;

/**
 * Class FeedGeneratorService
 * @package App\Service\Cian
 */
class FeedGeneratorService implements FeedGeneratorServiceInterface
{
    /** @var PublicationProviderInterface */
    private $dataProvider;

    /**
     * FeedGeneratorService constructor.
     * @param PublicationProviderInterface $dataProvider
     */
    public function __construct(PublicationProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * Generates and returns XML feed
     * @return Cian\BaseObject
     * @throws Exception
     */
    public function generateFeed(): ?Cian\BaseObject
    {
        $objects = new Cian\BaseObject;

        /** @var Publication[] $pubList */
        $pubList = $this->dataProvider->getPublications();

        foreach ($pubList as $pub) {
            try {
                $object = null;
                $object = new Cian\Base\CommercialObject();

                    $object->setCategory($pub->category);
                    $object->setExternalId($pub->id);
                    $object->setDescription($pub->description);
                    $object->setAddress($pub->address);
                    $object->setCadastralNumber('47:14:1203001:814');

                    $phoneSchema = new Cian\PhoneSchema();
                    $phones = new Cian\Phones();

                    $phones->setCountryCode("+7");
                    $phones->setNumber("8122924622");

                    $phoneSchema->setPhoneSchema($phones);

                    $object->setPhones($phoneSchema);

                    $subAgent = new Cian\SubAgent();

                    $subAgent->setEmail($pub->email);

                    $object->setSubAgent($subAgent);

                    $auctionBet = new Cian\Bet();

                    $auctionBet->setBet(10);

                    $object->setAuction($auctionBet);

                    $photoSchema = new Cian\PhotoSchema();

                    $photo = new Cian\Photos();

                    $photo->setPhotosFullUrl("http://managers.6550101.ru/upload/photobank/09e/d02f9ab45ee6a629a60cf96eb3b60c68.jpg");
                    $photo->setPhotosIsDefault(true);

                    $photoSchema->setPhotoSchema($photo);

                    $object->setPhotos($photoSchema);

                    $cplModeration = new Cian\CplModeration();
                    $cplModeration->setPersonType(Cian\CplModeration::PERSON_TYPE_LEGAL);
                    $cplModeration->setFirstName($pub->organization);

                    $object->setFloorNumber($pub->floor);

                    $object->setTotalArea($pub->sqare);

                    $bargain = new BargainTermsInfo;

                    $bargain->setPrice($pub->price);

                    var_dump($bargain);

                    $object->setBargainTerms($bargain);



                $objects->objectList[] = $object;

            } catch (Throwable $e) {
                var_dump($pub, $e->getMessage());
                die;
            }
        }

        return $objects;
    }
}