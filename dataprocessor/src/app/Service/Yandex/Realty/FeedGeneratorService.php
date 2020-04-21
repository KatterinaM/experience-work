<?php

namespace App\Service\Yandex\Realty;

use App\Entity\Provider\Data\Publication;
use App\Entity\Yandex\Realty;
use App\Provider\Publication\PublicationProviderInterface;
use DateTime;
use Exception;
use Throwable;

/**
 * Class FeedGeneratorService
 * @package App\Service\Yandex\Realty
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
     * @return Realty\RealtyFeed
     * @throws Exception
     */
    public function generateFeed(): ?Realty\RealtyFeed
    {
        $feed = new Realty\RealtyFeed;
        $now = new DateTime;

        /** @var Publication[] $pubList */
        $pubList = $this->dataProvider->getPublications();
        foreach ($pubList as $pub) {
            try {
                $offer = new Realty\CommercialOffer;
                $offer->setInternalId($pub->id);
                $offer->setType(
                    $pub->type == 'Сдам'
                        ? Realty\CommercialOffer::OFFER_TYPE_LEASE
                        : Realty\CommercialOffer::OFFER_TYPE_SELL
                );

                switch ($pub->commercialType) {
                    case 'Земельный участок':
                    case 'Земельные участки':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_LAND);
                        break;
                    case 'Гостиница':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_HOTEL);
                        break;
                    case 'Офисное помещение':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_OFFICE);
                        break;
                    case 'Помещение общественного питания':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_PUBLIC_CATERING);
                        break;
                    case 'Помещение свободного назначения':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_FREE_PURPOSE);
                        break;
                    case 'Производственное помещение':
                    case 'Промназначения':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_MANUFACTURING);
                        break;
                    case 'Складское помещение':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_WAREHOUSE);
                        break;
                    case 'Торговое помещение':
                        $offer->setCommercialType(Realty\CommercialOffer::COMMERCIAL_TYPE_RETAIL);
                        break;
                }

                $offer->setCommercialBuildingType($pub->commercialBuildingType);
                $offer->setUrl($pub->url);
                $offer->setCreationDate($now);
                $offer->setFloor($pub->floor);
                $offer->setDescription($pub->description);

                $salesAgent = new Realty\SalesAgent;
                $salesAgent->setName($pub->manager);
                $salesAgent->setPhone($pub->phone);
                $salesAgent->setEmail($pub->email);
                $salesAgent->setOrganization($pub->organization);
                switch ($pub->propertyRights) {
                    case 'Собственник':
                        $salesAgent->setCategory(Realty\SalesAgent::CATEGORY_OWNER);
                        break;
                    case 'Посредник':
                        $salesAgent->setCategory(Realty\SalesAgent::CATEGORY_AGENCY);
                        break;
                    case 'Застройщик':
                        $salesAgent->setCategory(Realty\SalesAgent::CATEGORY_DEVELOPER);
                        break;
                }
                $offer->setSalesAgent($salesAgent);

                $location = new Realty\Location;
                $location->setAddress($pub->address);
                $location->setDistrict($pub->district);
                $location->setLocalityName($pub->localityName);
                if (!empty($pub->subLocalityName)) {
                    $location->setSubLocalityName($pub->subLocalityName);
                }
                if (!empty($pub->latitude) && !empty($pub->longitude)) {
                    $location->setLatitude($pub->latitude);
                    $location->setLongitude($pub->longitude);
                }
                if (!empty($pub->metro)) {
                    $metro = new Realty\Metro();
                    $metro->setName($pub->metro);
                    $metro->setTimeOnFoot($pub->timeOnFoot);
                    $metro->setTimeOnTransport($pub->timeOnTransport);
                    $location->setMetro($metro);
                }
                $offer->setLocation($location);

                $price = new Realty\Price;
                $price->setValue($pub->price);
                $price->setCurrency($pub->currency);
                if ($pub->sqareUnits == 'кв.м') {
                    $price->setUnit(Realty\Area::UNIT_SQM);
                }
                $price->setPeriod($pub->period);
                $offer->setPrice($price);

                $area = new Realty\Area;
                $area->setValue(trim($pub->sqare));
                if ($pub->sqareUnits == 'кв.м') {
                    $area->setUnit(Realty\Area::UNIT_SQM);
                }
                $offer->setArea($area);

                if (is_array($pub->images) && !empty($pub->images)) {
                    $images = [];
                    foreach ($pub->images as $url) {
                        $img = new Realty\Image;
                        $img->setUrl($url);
                        $images[] = $img;
                    }
                    $offer->setImages($images);
                }

                $feed->offerList[] = $offer;
            } catch (Throwable $e) {
                var_dump($pub, $e->getMessage());
                die;
            }
        }

        return $feed;
    }
}
