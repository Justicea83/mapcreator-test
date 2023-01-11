<?php

namespace App\Http\Controllers;

use App\Utils\MapCreatorUtils;
use Illuminate\Http\Client\RequestException;

class HomeController extends Controller
{
    /**
     * @throws RequestException
     */
    public function index()
    {
        $response = MapCreatorUtils::makeCall('/v1/organisations', 'get', [], true);
        return view('auth.home', [
            'organizations' => $response->json()['data']
        ]);
    }

    public function mapStyles(int $id)
    {
        $response = MapCreatorUtils::makeCall("/v1/organisations/{$id}/mapstyle-sets", 'get', [], true);
        return view('auth.map-styles', [
            'data' => $response->json()['data']
        ]);
    }

    public function svgSets(int $id)
    {
        $response = MapCreatorUtils::makeCall("/v1/organisations/{$id}/svg-sets", 'get', [], true);
        return view('auth.svg-sets',[
            'data' => $response->json()['data']
        ]);
    }
}
