<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TagsSeeder extends Seeder
{
    public function run()
    {

        $listRawDataInsert = [];
        for ($i = 0; $i < 500; $i++) {
            $rawData = [
                'tag_name' => "['sale' , 'Sale BDS' ]",
                'domain_id' => random_int(1, 5),

            ];
            $listRawDataInsert[] = $rawData;
        }

        \DB::table('tags')->insert($listRawDataInsert);
    }
}
