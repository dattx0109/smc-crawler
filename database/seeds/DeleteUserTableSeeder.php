<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DeleteUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')
            ->where('id', 5)
            ->delete();
        ;
    }
}
