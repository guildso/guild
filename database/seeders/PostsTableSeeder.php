<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'body' => 'Working on some cool stuff today... 😉',
                'created_at' => '2022-02-19 02:05:36',
                'id' => 2,
                'team_id' => 1,
                'updated_at' => '2022-02-19 02:05:36',
                'user_id' => 2,
            ),
            1 => 
            array (
                'body' => 'Hey team, are we still building middle-out with the new encryption we talked about last week. I was currently doing a little refactor to make it faster 💨',
                'created_at' => '2022-02-20 00:30:06',
                'id' => 5,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:30:06',
                'user_id' => 2,
            ),
            2 => 
            array (
                'body' => 'I just lined us up with 4 meetings today. Get ready for the 💰💰💰',
                'created_at' => '2022-02-20 00:35:09',
                'id' => 6,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:35:09',
                'user_id' => 1,
            ),
            3 => 
            array (
                'body' => 'Here\'s my thoughts on the broadcast today... At least it didn’t happen in a public and brutally embarrassing way.',
                'created_at' => '2022-02-20 00:37:37',
                'id' => 7,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:37:37',
                'user_id' => 3,
            ),
            4 => 
            array (
                'body' => 'Just had a chat with our new HR department, and they wanted to know what I do around here. "It’s not magic, it’s talent and sweat. People like me ensure your packets get delivered unsniffed. So what do I do? I make sure that one bad config on one key component doesn’t bankrupt the entire f*cking company. That’s what the f*ck I do."',
                'created_at' => '2022-02-20 00:39:22',
                'id' => 8,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:39:22',
                'user_id' => 3,
            ),
            5 => 
            array (
                'body' => 'Gilfoyle, You\'re such a dick.',
                'created_at' => '2022-02-20 00:40:44',
                'id' => 9,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:40:44',
                'user_id' => 4,
            ),
            6 => 
            array (
                'body' => 'So pumped to be part of the PiedPiper Team 🎉',
                'created_at' => '2022-02-20 00:51:41',
                'id' => 10,
                'team_id' => 1,
                'updated_at' => '2022-02-20 00:51:41',
                'user_id' => 5,
            ),
        ));
        
        
    }
}