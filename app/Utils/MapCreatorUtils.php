<?php

namespace App\Utils;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MapCreatorUtils
{
    public const ACCESS_TOKEN_KEY = "__map__app__access__token";

    public static function requestToken(): RedirectResponse
    {
        $query = http_build_query([
            'client_id' => config('map-creator.client_id'),
            'redirect_uri' => route('getAccessToken'),
            'response_type' => 'code',
        ]);

        return redirect(config('map-creator.host') . '/oauth/authorize?' . $query);
    }

    public static function getAccessToken(): string
    {
        if (session()->has(self::ACCESS_TOKEN_KEY)) {
            return session()->get(self::ACCESS_TOKEN_KEY);
        } else {
            return '';
        }
    }

    /**
     * @throws RequestException
     */
    public static function makeCall(string $endpoint, string $method = 'post', array $payload = [], bool $requiresAuth = false, bool $isFormRequest = false): Response
    {
        Log::info("================================ PREPARE PAYLOAD- $endpoint ============================================");

        $endpoint = config('map-creator.host') . $endpoint;

        Log::info(get_class(), [$endpoint => $payload]);

        try {
            $http =  Http::retry(3, 100);

            if($requiresAuth) {
                $http->withToken(self::getAccessToken());
            }

            if($isFormRequest) {
                $http->asForm();
            }

            return $http->$method($endpoint, $payload);

        } catch (RequestException $e) {
            Log::error(get_class(), ['message' => json_decode($e->response->body(), true)]);
            throw $e;
        }
    }

}
