<?php

namespace App\Service\Province;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Psr\Http\Message\ResponseInterface;

class ProvinceService
{
    private $guzzleClient;

    public function __construct(Client $client)
    {
        $this->guzzleClient = $client;
    }

    public function getList()
    {

        if(\Cache::get('province')){
            return \Cache::get('province');
        }
        $url = env('API_LIST_PROVINCE');

        $response = $this->guzzleClient->get($url, [
            'headers' => [
//                'Authorization' => 'Bearer ' . request()->bearerToken(),
                'Accept' => 'application/json'
            ],
        ]);
        $province = $this->getBodyContentResponse($response);
        $province = $this->refactorProvince($province);

        // set cache province
        \Cache::put('province', $province);

        return $province;
    }

    public function refactorProvince($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $key => $item){
            $keyAfterConvert = trim(strtoupper(convertStringUtf8Unmarked($key)));
            $rawDataNew[$keyAfterConvert] = $item;
        }
        return $rawDataNew;
    }

    public function getBodyContentResponse(ResponseInterface $response)
    {
        $data = [];
        if ($this->isResponseSuccess($response)) {
            return $data = json_decode($response->getBody()->getContents(), true);
        } else {
            return [];
        }
    }


    public function isResponseSuccess(ResponseInterface $response)
    {
        return $response->getStatusCode() == Response::HTTP_OK;
    }
}
