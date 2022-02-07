<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('badges')->insert(array (
            0 =>
            array (
                'id' => 1,
                'team_id' => 1,
                'name' => 'Team Player',
                'description' => 'Join a Guild',
                'details' => 'You have joined your first Guild',
                'award_message' => NULL,
                'requirement_class' => 'team',
                'requirement_value' => '1',
                'created_at' => '2019-06-12 06:56:10',
                'updated_at' => '2019-06-12 06:56:10',
            ),
            1 =>
            array (
                'id' => 2,
                'team_id' => 1,
                'name' => 'Wordsmith',
                'description' => 'Succssfully add your first task',
                'details' => 'You\'ve fully added a new task',
                'award_message' => NULL,
                'requirement_class' => 'task',
                'requirement_value' => '1',
                'created_at' => '2019-06-12 06:56:10',
                'updated_at' => '2019-06-12 06:56:10',
            ),
            2 =>
            array (
                'id' => 3,
                'team_id' => 1,
                'name' => 'Beginner',
                'description' => 'Start your first shift',
                'details' => 'You have successfully started a new shift',
                'award_message' => NULL,
                'requirement_class' => 'shift',
                'requirement_value' => '1',
                'created_at' => '2019-06-12 06:56:10',
                'updated_at' => '2019-06-12 06:56:10',
            ),
        ));


    }
}