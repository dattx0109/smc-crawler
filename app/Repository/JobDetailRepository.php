<?php


namespace App\Repository;

use Illuminate\Support\Facades\DB;

class JobDetailRepository
{

    const TABLE_NAME = 'job_detail';

    public function insert($dataInsert)
    {
        $rawDataInsert = [
            'job_id'                => $dataInsert['job_id'],
            'experience'            => $dataInsert['experience'],
            'degree'                => $dataInsert['degree'],
            'employee_quantity'     => $dataInsert['employee_quantity'],
            'sex'                   => $dataInsert['sex'],
            'age'                   => $dataInsert['age'],
            'job_description'       => $dataInsert['job_description'],
            'working_form'          => $dataInsert['working_form'],
            'role'                  => $dataInsert['role'],
            'probationary_period'   => $dataInsert['probationary_period'],
            'benefits'              => $dataInsert['benefits'],
            'other_requirements'    => $dataInsert['other_requirements'],
            'application_type'      => $dataInsert['application_type'],
            'created_at'            => date("Y/m/d H:i:s"),
            'updated_at'            => date("Y/m/d H:i:s"),

        ];
        DB::table(self::TABLE_NAME)->insert($rawDataInsert);

    }


}
