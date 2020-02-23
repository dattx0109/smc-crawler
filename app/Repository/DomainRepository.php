<?php


namespace App\Repository;
use Illuminate\Support\Facades\DB;

class DomainRepository
{
    const TABLE_DOMAIN = 'domains';
    const ITEM_OF_PAGE = 10;

    public function insertDataDomain($rawData)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->insertGetId($rawData)
        ;
    }

    public function findDomainByName($domainName)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->where('name', $domainName)
            ->count()
         ;
    }

    public function getDomainByDomainId($domainId)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->where('id', $domainId)
            ->first()
            ;
    }

    public function getListDomain()
    {
        return DB::table(self::TABLE_DOMAIN)
            ->join('users', self::TABLE_DOMAIN.'.user_id', '=', 'users.id')
            ->select('domains.*', 'users.name as user_name')
            ->orderBy('id', 'DESC')
            ->paginate(self::ITEM_OF_PAGE);
    }

    public function getNameDomain($domainId)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->where('id', $domainId)
            ->first()
            ;
    }
    public function getListAll()
    {
        return DB::table(self::TABLE_DOMAIN)->select('id', 'name')->get();
    }
}
