<?php

namespace Database\Seeders;

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
        $this->call(BadgesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
