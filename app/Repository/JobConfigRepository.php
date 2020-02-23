<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class JobConfigRepository
{
    const TABLE_JOBCONFIG = 'job-config';
    const TABLE_LIST_URL  = 'list_url'  ;

    /**
     * @param $rawData
     * @return bool
     */
    public function insertNewConfig($rawData)
    {
        return DB::table(self::TABLE_JOBCONFIG)
            ->insert($rawData)
        ;
    }

    public function findConfigByDomainId($domainId)
    {
        return DB::table(self::TABLE_JOBCONFIG)
            ->where('domain_id', $domainId)
            ->first()
        ;
    }

    public function updateConfigByRawDataAndDomainId($rawData, $domainId)
    {
        DB::table(self::TABLE_JOBCONFIG)
            ->where('domain_id', $domainId)
            ->update($rawData)
        ;
        return $rawData;
    }

    public function getListUrl($domainId)
    {
        return DB::table(self::TABLE_LIST_URL)
            ->where('domain_id', $domainId)
            ->get()
            ;
    }

    public function insertUrl($rawData)
    {
        return DB::table(self::TABLE_LIST_URL)
            ->insert($rawData)
        ;
    }

    public function findUrlByUrlAndDomainId($url, $domainId)
    {
        return DB::table(self::TABLE_LIST_URL)
            ->where('url', $url)
            ->where('domain_id', $domainId)
            ->count()
        ;
    }
}
