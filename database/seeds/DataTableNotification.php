<?php

use Illuminate\Database\Seeder;

class DataTableNotification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            [
                'name' => 'Hệ thống config crawler cảnh báo',
                'description' => 'Trường tên job hệ thống đang craw về length = 500 kí tự => quá dài',
                'type' => 1,
                'created_at' => date("Y/m/d H:i:s")
            ],
            [
                'name' => 'Hệ thống job process cảnh báo',
                'description' => 'Trường mức lương đang chuyển sang main database sai định dạng',
                'type' => 2,
                'created_at' => date("Y/m/d H:i:s")
            ],
            [
                'name' => 'Hệ thống crawler cảnh báo',
                'description' => 'Domain my word đang bị chặn không thể craw được data',
                'type' => 3,
                'created_at' => date("Y/m/d H:i:s")
            ],
            [
                'name' => 'Hệ thống Job process cảnh báo',
                'description' => 'Không thể convert được tỉnh thành quận huyện',
                'type' => 4,
                'created_at' => date("Y/m/d H:i:s")
            ]
        ];
        \DB::table('notifications')->insert($dataInsert);
    }
}
