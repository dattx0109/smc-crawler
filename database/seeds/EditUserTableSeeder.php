<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EditUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->where('id', 1)
            ->update([
                'name' => 'dat1234',
                'email' => 'dat1234@gmail.com',
                'password' => bcrypt('123456'),
                'level' => '1',
                "updated_at" => \Carbon\Carbon::now()  # new \Datetime()

            ]);
    }
}
