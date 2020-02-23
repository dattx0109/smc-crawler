<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class TagConfigRepository
{
    const TABLE_NAME = 'tag_config';

    public function removeTagConfigByDomainId($domainId)
    {
        DB::table(self::TABLE_NAME)
            ->where('domain_id', $domainId)
            ->delete()
        ;
    }

    public function insertTagByRawData($rawData)
    {
        DB::table(self::TABLE_NAME)
            ->insert($rawData)
        ;
    }
}