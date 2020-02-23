<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobsSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $listRawDataInsert = [];
        for ($i = 0; $i < 500; $i++) {
            $rawData = [
                'company_id'        => random_int(1, 9),
                'domain_id'         => random_int(1, 5),
                'job_name'          => 'Nhân Viên Kinh Doanh BĐS' . $i,
                'workplace'         => 'Hà Nội',
                'salary_origin'     => '7000000',
                'salary_kpi'        => '10000000',
                'date_expired'      => '2019-07-30 09:49:55',
                'date_publish'      => '2019-08-08 09:49:55',
                'status'            => random_int(1, 2),
                'status_convert'    => random_int(1, 2),
                'link_crawler'      => 'https://vieclam24h.vn/nhan-vien-kinh-doanh/nhan-vien-kinh-doanh-bds-c96p0id3074124.html',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $listRawDataInsert[] = $rawData;
        }
        \DB::table('jobs')->insert($listRawDataInsert);
    }
}
