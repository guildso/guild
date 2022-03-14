<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'created_at' => '2022-02-18 16:04:19',
                'id' => 1,
                'name' => 'PiedPiper',
                'news' => 'We just released our new PiedPiper coin. Click here to learn more...',
                'updated_at' => '2022-02-20 00:27:01',
                'website' => 'http://piedpiper.com/',
            ),
        ));
        
        
    }
}