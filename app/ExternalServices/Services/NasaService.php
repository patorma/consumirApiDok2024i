<?php

namespace App\ExternalServices\Services;

use App\Bussines\Interface\NasaApiInterface;
use GuzzleHttp\Client;

class NasaService implements NasaApiInterface{

    private Client $client;

    public function __construct(){

        $this->client = new Client(['base_url' => env('NASA_URL'),'verify'=>false]);

    }

    public function fetchData(string $endpoint): array{
        $response = $this->client->get(env('NASA_URL').$endpoint,[
            'query' => ['api_key' => env('NASA_API_KEY')]
        ]);
 //dd(json_decode($response->getBody()->getContents(), true));
        return json_decode($response->getBody()->getContents(), true);
    }
}
