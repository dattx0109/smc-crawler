<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class JobTagSeeder extends Seeder
{
    public function run()
    {

        $listRawDataInsert = [];
        for ($i = 0; $i < 500; $i++) {
            $rawData = [
                'tag_id' => $i + 1,
                'jobs_id' => $i + 1,

            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('job_tag')->insert($listRawDataInsert);
    }
}
