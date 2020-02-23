<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class JobRepository
{
    CONST TABLE_NAME = 'jobs';
    public function insert($dataInsert)
    {
        $rawDataInsert = [
            'company_id'    => $dataInsert['company_id'],
            'domain_id'     => $dataInsert['domain_id'],
            'job_name'      => $dataInsert['job_name'],
            'workplace'     => $dataInsert['workplace'],
            'salary_origin' => $dataInsert['salary_origin'],
            'salary_kpi'    => $dataInsert['salary_kpi'],
            'date_expired'  => $dataInsert['date_expired'],
            'date_publish'  => $dataInsert['date_publish'],
            'date_period'   => $dataInsert['date_period'],
            'link_url_test' => $dataInsert['link_url_test'],
            'created_at'    => date("Y/m/d H:i:s"),
            'updated_at'    => date("Y/m/d H:i:s"),

        ];
        DB::table(self::TABLE_NAME)->insert($rawDataInsert);

    }

}
