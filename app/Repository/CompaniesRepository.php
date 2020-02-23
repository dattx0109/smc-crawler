<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class CompaniesRepository
{

    const TABLE_NAME = 'companies';

    public function insert($dataInsert)
    {
        $rawDataInsert = [
            'company_name'          => $dataInsert['company_name'],
            'company_address'       => $dataInsert['company_address'],
            'company_size'          => $dataInsert['company_size'],
            'company_description'   => $dataInsert['company_description'],
            'company_hotline'       => $dataInsert['company_hotline'],
            'company_website'       => $dataInsert['company_website'],
            'company_email'         => $dataInsert['company_email'],
            'company_logo'          => $dataInsert['company_logo'],
            'company_image'         => $dataInsert['company_image'],
            'created_at'            => date("Y/m/d H:i:s"),
            'updated_at'            => date("Y/m/d H:i:s"),

        ];
        DB::table(self::TABLE_NAME)->insert($rawDataInsert);

    }


}
