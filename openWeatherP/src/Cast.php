<?php

declare(strict_types=1);

namespace Src;

use GuzzleHttp\Client;

class Cast
{
    private const DEFAULT_APIKEY = "5de3cbc537861aab28f0bb3e3846400c";
    private string $apiKey;
    private string $city;

    public function __construct(string $city  , ?string $apiKey = null)
    {
        $this->city = $city;
        $this->apiKey = $apiKey ?? self::DEFAULT_APIKEY;
    }


    public function getCast(): object
    {
        $client = new Client();
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$this->city&appid={$this->apiKey}&units=metric";
        $response = $client->request('GET', $url);
        return $castReport = json_decode($response->getBody()->getContents());
    }

}