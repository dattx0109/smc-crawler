<?php


namespace App\Repository;
use Illuminate\Support\Facades\DB;

class JobConfigDetailRepository
{
    const TABLE_NAME = 'job_config_detail';

    public function findJobConfigByDomainId($domainId)
    {
        return DB::table(self::TABLE_NAME)
            ->where('domain_id', $domainId)
            ->first()
        ;
    }

    public function findJobDetailAndTag($domainId)
    {
        return DB::table(self::TABLE_NAME)
            ->join('tag_config', self::TABLE_NAME.'.domain_id', '=', 'tag_config.domain_id')
            ->where(self::TABLE_NAME.'.domain_id', $domainId)
            ->get()
            ;
    }

    public function insertJobConfigByRawData($rawData)
    {
        return DB::table(self::TABLE_NAME)
            ->insert($rawData)
        ;
    }

    public function updateJobConfigByRawDataById($rawData, $id)
    {
        return DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->update($rawData)
        ;
    }
}