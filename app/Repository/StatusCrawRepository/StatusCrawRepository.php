<?php


namespace App\Repository\StatusCrawRepository;


use Illuminate\Support\Facades\DB;

class StatusCrawRepository
{
    const TABLE_CONFIG_WEBSITE = 'config_website';
    public function getStatusCraw()
    {
        return DB::table(self::TABLE_CONFIG_WEBSITE)
            ->select('status')
            ->orderBy('id', 'DESC')
            ->first()
            ;
    }
}
