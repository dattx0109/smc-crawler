<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class JobContactRepository
{

    const TABLE_NAME = 'job_contact';

    public function insert($dataInsert)
    {
        $rawDataInsert = [
            'job_id'                    => $dataInsert['job_id'],
            'job_contact_name'          => $dataInsert['job_contact_name'],
            'job_contact_phone'         => $dataInsert['job_contact_phone'],
            'job_contact_email'         => $dataInsert['job_contact_email'],
            'job_contact_description'   => $dataInsert['job_contact_description'],
            'created_at'                => date("Y/m/d H:i:s"),
            'updated_at'                => date("Y/m/d H:i:s"),

        ];
        DB::table(self::TABLE_NAME)->insert($rawDataInsert);

    }


}
