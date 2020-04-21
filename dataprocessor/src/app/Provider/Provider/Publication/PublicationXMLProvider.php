<?php

namespace App\Provider\Publication;

use App\Entity\Provider\Data\Publication;
use DOMDocument;
use DOMNode;

/**
 * Class PublicationDataProvider
 * @package App\Provider\Publication
 */
class PublicationXMLProvider implements PublicationProviderInterface
{
    /**
     * Get publication array
     * @return Publication[]
     */
    public function getPublications(): array
    {
        $avitoPublications = $this->getOldAvitoXMLData();
        $yandexPublications = $this->getOldYandexXMLData();
        $cianPublications = $this->getOldCianXMLData();
        $idList = array_intersect(
            array_keys($avitoPublications),
            array_keys($yandexPublications),
            array_keys($cianPublications)
        );
        $pubList = [];

        foreach ($idList as $id) {
            $pub = new Publication;
            $pub->id = $id;
            $pub->type = $avitoPublications[$id]['OperationType'] ?? null;
            $pub->propertyRights = $avitoPublications[$id]['PropertyRights'] ?? null;
            $pub->category = $avitoPublications[$id]['Category'] ?? null;
            $pub->category = $cianPublications[$id]['Category'] ?? null;
            $pub->commercialType = $avitoPublications[$id]['ObjectType'] ?? null;
            $pub->commercialBuildingType = $yandexPublications[$id]['commercial-building-type'] ?? null;
            $pub->title = $avitoPublications[$id]['Title'] ?? null;
            $pub->url = $yandexPublications[$id]['url'] ?? null;
            $pub->creationDate = $yandexPublications[$id]['creation-date'] ?? null;
            $pub->country = $yandexPublications[$id]['location-country'] ?? null;
            $pub->district = $yandexPublications[$id]['location-district'] ?? null;
            $pub->localityName = $yandexPublications[$id]['location-locality-name'] ?? null;
            $pub->subLocalityName = $yandexPublications[$id]['location-sub-locality-name'] ?? null;
            $pub->address = $avitoPublications[$id]['Address'] ?? null;
            $pub->longitude = $yandexPublications[$id]['location-longitude'] ?? null;
            $pub->latitude = $yandexPublications[$id]['location-latitude'] ?? null;
            $pub->phone = $yandexPublications[$id]['sales-agent-phone'] ?? null;
            $pub->email = $avitoPublications[$id]['EMail'] ?? null;
            $pub->manager = $avitoPublications[$id]['ManagerName'] ?? null;
            $pub->organization = $avitoPublications[$id]['CompanyName'] ?? null;
            $pub->price = $avitoPublications[$id]['Price'] ?? null;
            $pub->currency = $yandexPublications[$id]['price-currency'] ?? null;
            $pub->priceType = $yandexPublications[$id]['price-unit'] ?? null;
            $pub->period = $yandexPublications[$id]['price-period'] ?? null;
            $pub->floor = $avitoPublications[$id]['Floor'] ?? null;
            $pub->floorCount = $avitoPublications[$id]['Floors'] ?? null;
            $pub->sqare = $avitoPublications[$id]['Square'] ?? $avitoPublications[$id]['LandArea'] ?? null;
            $pub->sqareUnits = $yandexPublications[$id]['area-unit'] ?? null;
            $pub->images = $avitoPublications[$id]['Images'] ?? null;
            $pub->description = $avitoPublications[$id]['Description'] ?? null;
            $pub->commission = $avitoPublications[$id]['LeaseCommissionSize'] ?? null;
            $pub->deposit = $avitoPublications[$id]['LeaseDeposit'] ?? null;
            $pub->paidService = $avitoPublications[$id]['AdStatus'] ?? null;
            $pub->metro = $yandexPublications[$id]['location-metro-name'] ?? null;
            $pub->timeOnFoot = $yandexPublications[$id]['location-metro-time-on-foot'] ?? null;
            $pub->timeOnTransport = $yandexPublications[$id]['location-metro-time-on-transport'] ?? null;
            $pub->distance = $avitoPublications[$id]['DistanceToCity'] ?? null;

            $pubList[] = $pub;
        }

        return $pubList;
    }

    /**
     * @return array
     */
    private function getOldAvitoXMLData(): array
    {
        $xml = file_get_contents('/upload/avito.xml');

        $doc = new DOMDocument();
        $doc->formatOutput = true;
        $doc->loadXML($xml);
        $adList = $doc->getElementsByTagName('Ad');

        $adDataArray = [];
        foreach ($adList as $ad) {
            $adData = [];

            /** @var DOMNode $ad */
            foreach ($ad->childNodes as $node) {
                /** @var DOMNode $node */
                if ($node->nodeName != 'Images') {
                    $adData[$node->nodeName] = $node->nodeValue;
                } else {
                    $adData['Images'] = [];
                    /** @var DOMNode $ad */
                    foreach ($node->childNodes as $imageNode) {
                        /** @var DOMNode $imageNode */
                        $imageUrl = $this->encodeUrl($imageNode->attributes->getNamedItem('url')->nodeValue);
                        if (!empty($imageUrl)) {
                            $adData['Images'][] = $imageUrl;
                        }
                    }
                }
            }
            $adDataArray[$adData['Id']] = $adData;
        }
        return $adDataArray;
    }

    /**
     * @return array
     */
    private function getOldYandexXMLData(): array
    {
        $xml = file_get_contents('/upload/yrl_655.xml');

        $doc = new DOMDocument();
        $doc->formatOutput = true;
        $doc->loadXML($xml);
        $adList = $doc->getElementsByTagName('offer');

        $adDataArray = [];
        foreach ($adList as $ad) {
            $adData = [
                'id' => $ad->attributes->getNamedItem('internal-id')->nodeValue,
                'images' => [],
            ];

            /** @var DOMNode $ad */
            foreach ($ad->childNodes as $node) {
                /** @var DOMNode $node */
                if ($node->nodeName == 'image') {
                    $imageUrl = $this->encodeUrl($node->nodeValue);
                    if (!empty($imageUrl)) {
                        $adData['images'][] = $imageUrl;
                    }
                } elseif ($node->hasChildNodes() && $node->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                    foreach ($node->childNodes as $subNode) {
                        /** @var DOMNode $subNode */
                        if ($subNode->hasChildNodes() && $subNode->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                            foreach ($subNode->childNodes as $subSubNode) {
                                /** @var DOMNode $subSubNode */
                                $fieldName = $node->nodeName . '-' . $subNode->nodeName . '-' . $subSubNode->nodeName;
                                $adData[$fieldName] = $subSubNode->nodeValue;
                            }
                        } else {
                            $fieldName = $subNode->nodeName;
                            $adData[$fieldName] = $subNode->nodeValue;
                        }
                    }
                } else {
                    $adData[$node->nodeName] = $node->nodeValue;
                }
            }
            $adDataArray[$adData['id']] = $adData;
        }
        return $adDataArray;
    }

    /**
     * @return array
     */
    private function getOldCianXMLData(): array
    {
        $xml = file_get_contents('/upload/cian.xml');

        $doc = new DOMDocument();
        $doc->formatOutput = true;
        $doc->loadXML($xml);
        $adList = $doc->getElementsByTagName('feed');

        $adDataArray = [];
        foreach ($adList as $ad) {
            $adData = [];

            /** @var DOMNode $ad */
            foreach ($ad->childNodes as $node) {
                /** @var DOMNode $node */

                    if ($node->hasChildNodes() && $node->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                    foreach ($node->childNodes as $subNode) {
                        if ($subNode->nodeName == 'Photos') {
                            $imgPath = [];
                            foreach ($subNode->childNodes as $subSubNode) {
                                if ($subSubNode->hasChildNodes() && $subSubNode->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                                    foreach ($subSubNode->childNodes as $subSubPotoNode) {
                                        /** @var DOMNode $subSubPotoNode */
                                        $img[$subSubPotoNode->nodeName] = $subSubPotoNode->nodeValue;
                                    }
                                    $imgPath [] = $img;
                                }

                            }
                            $adData[$subSubNode->nodeName] = $imgPath;
                        } else {
                            /** @var DOMNode $subNode */
                            if ($subNode->hasChildNodes() && $subNode->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                                foreach ($subNode->childNodes as $subSubNode) {
                                    if ($subSubNode->hasChildNodes() && $subSubNode->childNodes->item(0)->nodeType == XML_ELEMENT_NODE) {
                                        foreach ($subSubNode->childNodes as $subSubSubNode) {
                                            /** @var DOMNode $subSubNode */
                                            $fieldName = $subSubSubNode->nodeName;
                                            $adData[$fieldName] = $subSubSubNode->nodeValue;
                                        }
                                    }
                                    else{
                                        /** @var DOMNode $subSubNode */
                                        $fieldName = $subSubNode->nodeName;
                                        $adData[$fieldName] = $subSubNode->nodeValue;
                                    }

                                }
                            } else {
                                $fieldName = $subNode->nodeName;
                                $adData[$fieldName] = $subNode->nodeValue;
                            }
                        }
                    }
                } else {
                    $adData[$node->nodeName] = $node->nodeValue;
                }
            }

            $adDataArray[$adData['ExternalId']] = $adData;
        }

        return $adDataArray;
    }

    /**
     * @param string $url
     * @return string
     */
    private function encodeUrl(string $url): ?string
    {
        $urlComponents = parse_url($url);
        if (!empty($urlComponents) && isset($urlComponents['scheme'], $urlComponents['host'], $urlComponents['path'])) {
            $url = $urlComponents['scheme'] . '://'
                . $urlComponents['host']
                . (isset($urlComponents['port']) && !empty($urlComponents['port']) ? ':' . $urlComponents['port'] : '')
                . implode('/', array_map('urlencode', explode('/', $urlComponents['path'])));
            return $url;
        } else {
            return null;
        }
    }
}
