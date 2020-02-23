<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CompaniesSeeder extends Seeder
{

    public function run()
    {
        $listRawDataInsert = [];
        for ($i = 0; $i < 10; $i++) {
            $rawData = [
                'company_name'          => 'Samacom'.$i,
                'company_address'       => 'Số 580 đường láng',
                'company_size'          => '20' . $i,
                'company_description'   => 'Công ty vươn tầm châu á',
                'company_hotline'       => '0999999999',
                'company_website'       => 'WWW.samacom.com',
                'company_email'         => 'PTD@gmail.com',
                'company_logo'          => 'img/mvc_logo.png',
                'company_image'         => 'img/p8.jpg',
            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('companies')->insert($listRawDataInsert);
    }
}
