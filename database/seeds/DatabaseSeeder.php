<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(EditUserTableSeeder::class);
        $this->call(DeleteUserTableSeeder::class);
        $this->call(AddUserTableSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(DomainJobSeeder::class);
        $this->call(JobContactSeeder::class);
        $this->call(JobDetailSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(JobTagSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(ConfigWebsiteTableSeeder::class);
    }
}
