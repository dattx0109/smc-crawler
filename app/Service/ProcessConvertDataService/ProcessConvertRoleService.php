<?php


namespace App\Service\ProcessConvertDataService;


class ProcessConvertRoleService
{

    public static function convertRole($domainId, $role)
    {
        $value = null;
        switch ($domainId){
            case ConstDomain::MY_WORK:
                $value = self::handleMyWork($role);
                break;
            case ConstDomain::TIM_VIEC_NHANH:
                $value = self::handleTimViecNhanh($role);
                break;
            case ConstDomain::VIEC_LAM_24H:
                $value = self::handleViecLam24h($role);
                break;
            case ConstDomain::TIM_VIEC_365:
                $value = self::handleViecLam365($role);
                break;
            case ConstDomain::CAREER_BUILDER:
                $value = self::handleCareerBuilder($role);
                break;
        }
        return $value;
    }

    public static function handleCommonRole($role)
    {
        $roleAfterConvert = trim(strtoupper(convertStringUtf8Unmarked($role)));

        if( $roleAfterConvert == 'NHAN VIEN' ){
            return 1;
        }
        elseif( $roleAfterConvert == 'TRUONG NHOM' ){
            return 2;
        }
        elseif( $roleAfterConvert == 'TRUONG PHONG' ){
            return 3;
        }
        elseif( $roleAfterConvert == 'GIAM DOC' ){
            return 4;
        }
        else {
            return null;
        }
    }

    public static function handleMyWork($role)
    {
        return self::handleCommonRole(($role));
    }

    public static function handleTimViecNhanh($role)
    {
        return self::handleCommonRole(($role));
    }

    public static function handleViecLam24h($role)
    {
        return self::handleCommonRole(($role));
    }

    public static function handleViecLam365($role)
    {
        return self::handleCommonRole(($role));
    }

    public static function handleCareerBuilder($role)
    {
        return self::handleCommonRole(($role));
    }

}