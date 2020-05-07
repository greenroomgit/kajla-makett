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
        $this->call(AdminTablesSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(AdminRoleUsersTableSeeder::class);
        $this->call(GuideStepsTableSeeder::class);
    }
}
