<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobContactSeeder extends Seeder
{
    public function run()
    {

        $listRawDataInsert = [];
        for ($i = 0; $i < 500; $i++) {
            $rawData = [
              'job_id' => $i + 1,
              'job_contact_name' => 'Mr. Đạt',
              'job_contact_phone' => '0989898989',
              'job_contact_email' => 'Datpt@gmail.com',
              'job_contact_description' => 'Tầng 23B, Toà nhà Sông Đà, Phạm Hùng, Hà Nội.',

            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('job_contact')->insert($listRawDataInsert);
    }
}
