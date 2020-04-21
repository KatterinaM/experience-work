<?php

namespace App\Service\Avito;

use App\Entity\Avito\Base\AbstractAd;
use App\Entity\Avito\Base\OperationTypeInterface;
use App\Entity\Provider\Data\Publication;
use App\Entity\Avito;
use App\Provider\Publication\PublicationProviderInterface;
use Exception;
use Throwable;

/**
 * Class FeedGeneratorService
 * @package App\Service\Avito
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
     * @return Avito\Ads
     * @throws Exception
     */
    public function generateFeed(): ?Avito\Ads
    {
        $ads = new Avito\Ads;

        /** @var Publication[] $pubList */
        $pubList = $this->dataProvider->getPublications();
        foreach ($pubList as $pub) {
            try {
                $ad = null;
                switch ($pub->category) {
                    case AbstractAd::CATEGORY_COMMERCIAL:
                        if ($pub->type == OperationTypeInterface::OPERATION_TYPE_LEASE) {
                            $ad = new Avito\Lease\CommercialAd();
                            $ad->setSquare(trim($pub->sqare));
                            $ad->setTitle($pub->title);
                            $ad->setFloor($pub->floor);
                            $ad->setFloors($pub->floorCount);
                        }
                        break;

                    case AbstractAd::CATEGORY_LAND_PLOTS:
                        if ($pub->type == OperationTypeInterface::OPERATION_TYPE_LEASE) {
                            $ad = new Avito\Lease\LandPlotAd();
                            $ad->setLandArea(trim($pub->sqare));
                            $ad->setDistanceToCity($pub->distance);
                        }
                        break;
                }

                if (!empty($ad)) {
                    $ad->setId($pub->id);
                    $ad->setObjectType($pub->commercialType);
                    $ad->setPropertyRights($pub->propertyRights);
                    $ad->setPrice($pub->price);
                    $ad->setAddress($pub->address);
                    $ad->setManagerName($pub->manager);
                    $ad->setCompanyName($pub->organization);
                    $ad->setDescription($pub->description);
                    $ad->setLeaseCommissionSize($pub->commission);
                    $ad->setLeaseDeposit($pub->deposit);
                    $ad->setAdStatus($pub->paidService);

                    if (is_array($pub->images) && !empty($pub->images)) {
                        $images = [];
                        foreach ($pub->images as $url) {
                            $img = new Avito\Image;
                            $img->url = $url;
                            $images[] = $img;
                        }
                        $ad->setImages($images);
                    }

                    $ads->adList[] = $ad;
                }
            } catch (Throwable $e) {
                var_dump($pub, $e->getMessage());
                die;
            }
        }

        return $ads;
    }
}
