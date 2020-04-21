<?php

namespace App\Entity\Publication\API;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

/**
 * Class ResponseHandler
 * @package App\Entity\Publication\API
 */
class ResponseHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'App\Entity\Publication\API\Response',
                'method' => 'deserializeResponseFromJson',
            ],
        ];
    }

    public function deserializeResponseFromJson(
        JsonDeserializationVisitor $visitor,
        $data,
        /** @noinspection PhpUnusedParameterInspection */
        array $type,
        /** @noinspection PhpUnusedParameterInspection */
        Context $context
    ) {
        [$success, $result] = $data;

        if (!$success || !is_array($result)) {
            return null;
        } else {
            $response = new Response;
            $response->success = (bool) $success;
            $response->items = $visitor->visitArray($result, [
                'params' => [
                    ['name' => 'App\Entity\Publication\API\Publication']
                ]
            ]);
            return $response;
        }
    }
}
