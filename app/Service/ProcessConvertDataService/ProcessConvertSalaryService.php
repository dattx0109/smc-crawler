<?php


namespace App\Service\ProcessConvertDataService;


class ProcessConvertSalaryService
{

    public static function convertSalary($domainId, $salary)
    {
        $value = null;
        switch ($domainId){
            case ConstDomain::MY_WORK:
                $value = self::handleMyWork($salary);
                break;
            case ConstDomain::TIM_VIEC_NHANH:
                $value = self::handleTimViecNhanh($salary);
                break;
            case ConstDomain::VIEC_LAM_24H:
                $value = self::handleViecLam24h($salary);
                break;
            case ConstDomain::TIM_VIEC_365:
                $value = self::handleViecLam365($salary);
                break;
        }
        return $value;
    }

    public static function handleMyWork($salary)
    {
       return self::handleBase($salary);
    }

    public static function handleBase($salary)
    {

        $salary = str_replace(' triệu', '', $salary);
        $splitSalary = explode('-', $salary);

        if( ! $splitSalary || count($splitSalary) !== 2){
            return null;
        }
        return [
            'min' => (int)(trim($splitSalary[0]).'000000'),
            'max' => (int)(trim($splitSalary[1]).'000000'),
        ];
    }

    public static function handleTimViecNhanh($salary)
    {
        return self::handleBase($salary);
    }

    public static function handleViecLam24h($salary)
    {
        return self::handleBase($salary);
    }

    public static function handleViecLam365($salary)
    {
        return self::handleBase($salary);
    }

}
