<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $listRawDataInsert = [];
        for ($i = 0; $i < 50; $i++) {
            $rawData = [
                'name'          => 'Notification' . $i,
                'description'   => 'Thông báo' . $i,
                'type'          => random_int(1, 3),
                'user_id'       => $i,
                'domain_id'     => $i,
                'created_at'    => '2019-07-30 09:49:55',
                'updated_at'    => '2019-07-30 09:49:55',
            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('notifications')->insert($listRawDataInsert);
    }
}
