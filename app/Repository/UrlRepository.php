<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class UrlRepository
{

    const TABLE_LIST_URL = 'list_url';

    public function insert($dataInsert)
    {
        $rawDataInsert = [
            'url' => $dataInsert['url'],
            'type' => $dataInsert['type'],
            'domain_id' => $dataInsert['domain_id'],
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),

        ];
        DB::table(self::TABLE_LIST_URL)->insert($rawDataInsert);

    }

    public function findUrlByUrlAndDomainId($dataCheck)
    {
        return DB::table(self::TABLE_LIST_URL)
            ->where('url', $dataCheck['url'])
            ->where('domain_id', $dataCheck['domain_id'])
            ->count();
    }

    public function getList($domainId)
    {
        return DB::table(self::TABLE_LIST_URL)
            ->where('domain_id', $domainId)->get();
    }

}
