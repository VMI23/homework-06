<?php

declare(strict_types=1);

namespace CompanyReg;

use GuzzleHttp\Client;

class ApiResponse
{

    private const URI = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=";
    private const RESOURCE_ID = "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&";
    private string $uri;
    private string $resourceID;

    /**
     * @param string $uri
     * @param string $resourceID
     */
    public function __construct(?string $uri = null, ?string $resourceID = null)
    {
        $this->uri = $uri ?? self::URI;
        $this->resourceID = $resourceID ?? self::RESOURCE_ID;
    }

    public function getRecords($registrationNumber)
    {
        $client = new Client();
        $response = $client->request('GET', "{$this->uri}{$registrationNumber}{$this->resourceID}");
        $data = json_decode($response->getBody()->getContents());
        if (empty($data->result->records)) {
            return null;
        }
        return $records = $data->result->records[0];
    }


}