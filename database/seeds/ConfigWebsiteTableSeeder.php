<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigWebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('config_website')->insert([
            'name'    => 'cap nhat config',
            'status'   => '1',
            'type'   => '1',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
        ]);
    }
}
