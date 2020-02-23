<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainJobSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {

        $listRawDataInsert = [];
        for ($i = 0; $i < 5; $i++) {
            $rawData = [
                'name'      => 'https://vieclam24h.vn/' . $i,
//                'start_at'  => '2019-07-30 09:49:55',
                'status'    => random_int(1, 2),
                'user_id'   => random_int(1, 2),
            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('domains')->insert($listRawDataInsert);
    }
}
