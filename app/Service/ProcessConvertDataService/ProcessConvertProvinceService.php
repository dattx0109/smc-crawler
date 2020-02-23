<?php

namespace App\Service\ProcessConvertDataService;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Psr\Http\Message\ResponseInterface;

class ProcessConvertProvinceService
{
    private $guzzleClient;

    public static function convertProvince($domainId, $province)
    {
        $value = null;
        switch ($domainId){
            case ConstDomain::MY_WORK:
                $value = self::handleMyWork($province);
                break;
            case ConstDomain::TIM_VIEC_NHANH:
                $value = self::handleTimViecNhanh($province);
                break;
            case ConstDomain::VIEC_LAM_24H:
                $value = self::handleViecLam24h($province);
                break;
            case ConstDomain::TIM_VIEC_365:
                $value = self::handleViecLam365($province);
                break;
        }
        return $value;
    }

    public static function getAllProvince()
    {
        if(\Cache::get('province')){
            return \Cache::get('province');
        }
        $url = env('API_LIST_PROVINCE');

        $response = Client::get($url, [
            'headers' => [
//                'Authorization' => 'Bearer ' . request()->bearerToken(),
                'Accept' => 'application/json'
            ],
        ]);
        $province = self::getBodyContentResponse($response);
        $province = self::refactorProvince($province);

        // set cache province
        \Cache::put('province', $province);

        return $province;
    }

    public static function refactorProvince($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $key => $item){
            $keyAfterConvert = trim(strtoupper(convertStringUtf8Unmarked($key)));
            $rawDataNew[$keyAfterConvert] = $item;
        }
        return $rawDataNew;
    }

    public static function getBodyContentResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() == Response::HTTP_OK) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return [];
    }

    public static function handleMyWork($value)
    {

        $province = self::getAllProvince();
        if(isset($province[$value])){
            return $province[$value];
        }

        return null;
    }



    public static function handleTimViecNhanh($value)
    {
        $province = self::getAllProvince();
        if(isset($province[$value])){
            return $province[$value];
        }

        return null;
    }

    public static function handleViecLam24h($value)
    {
        $province = self::getAllProvince();
        if(isset($province[$value])){
            return $province[$value];
        }

        return null;
    }

    public static function handleViecLam365($value)
    {
        $province = self::getAllProvince();
        if(isset($province[$value])){
            return $province[$value];
        }

        return null;
    }


}
