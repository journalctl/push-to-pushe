<?php

namespace Journalctl\PushToPushe;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class PushToPusheClient
{
    /**
     * @const The API URL for Pushe.
     */
    private const API_URL = 'https://api.pushe.co/v2/messaging/notifications';

    /**
     * Send push notification.
     *
     * @param array $pushedIds
     * @param array $data
     * @param array $appIds
     * @return bool
     */
    public static function sendNotification(array $pushedIds, array $data, array $appIds): bool
    {
        $client = new Client();

        if (count($appIds) == 0) {
            $appIds = confing('push-to-pushe.app_ids');
        }

        if (count($appIds) == 0) {
            return false;
        }

        try {
            $client->request('post', self::API_URL, [
                'verify' => config('push-to-pushe.ssl_verify'),
                'headers' => [
                    'Authorization' => 'Token ' . config('push-to-pushe.token'),
                    'Content-Type' => 'application/json',
                ],
                'body' => self::buildData($pushedIds, $data, $appIds),
            ]);
        }
        catch (GuzzleException $guzzleException) {
            return false;
        }

        return true;
    }

    /**
     * Build pushe notification data.
     *
     * @param array $pusheIds
     * @param array $data
     * @param array $appIds
     * @return mixed
     */
    private static function buildData(array $pusheIds, array $data, array $appIds)
    {
        return json_encode([
            'filters' => ['pushe_id' => $pusheIds],
            'app_ids' => $appIds,
            'data' => $data,
        ]);
    }
}