<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'created_at' => '2022-02-18 16:04:19',
                'id' => 1,
                'name' => 'PiedPiper Developers',
                'personal_team' => 1,
                'updated_at' => '2022-02-20 00:33:04',
                'user_id' => 1,
            ),
        ));
        
        
    }
}