<?php


namespace App\Service\ProcessConvertDataService;


class ProcessConvertSexService
{
    public static function convertSex($sex)
    {
        $sexAfterConvert = trim(strtoupper(convertStringUtf8Unmarked($sex)));
        if ($sexAfterConvert === 'NAM' || $sexAfterConvert === 'MALE'){
           return $sex = 1;
        }
        elseif ($sexAfterConvert === 'NU' || $sexAfterConvert === 'FEMALE'){
            return $sex = 2;
        }
        elseif ($sexAfterConvert === null){
            return $sex = 4;
        }
        return $sex = 3;
    }
}
