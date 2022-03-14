<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('team_user')->delete();
        
        \DB::table('team_user')->insert(array (
            0 => 
            array (
                'created_at' => '2022-02-20 00:27:33',
                'id' => 1,
                'role' => 'manager',
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:27:33',
                'user_id' => 2,
            ),
            1 => 
            array (
                'created_at' => '2022-02-20 00:35:55',
                'id' => 2,
                'role' => 'member',
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:35:55',
                'user_id' => 3,
            ),
            2 => 
            array (
                'created_at' => '2022-02-20 00:40:25',
                'id' => 3,
                'role' => 'member',
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:40:25',
                'user_id' => 4,
            ),
            3 => 
            array (
                'created_at' => '2022-02-20 00:42:28',
                'id' => 4,
                'role' => 'member',
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:42:28',
                'user_id' => 5,
            ),
        ));
        
        
    }
}