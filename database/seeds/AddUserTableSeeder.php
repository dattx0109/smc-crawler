<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AddUserTableSeeder extends Seeder
{

    public  $userProvider = [
        [
            'email'    => 'admin@samacom.com.vn',
            'password' => 'samacom123456'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'    => 'admin',
            'email'   => 'admin@samacom.com.vn',
            'password' => bcrypt('samacom123456'),
            'level'   => '1',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
        ]);
    }
}
