<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'airdrop' => 0,
                'created_at' => '2022-02-18 16:04:19',
                'current_team_id' => 1,
                'email' => 'erlich@piedpiper.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'Erlich Bachman',
                'password' => '$2y$10$F.a4NGVv20pKqucVzdGgaO.XCEcHPGEhDG1oLDytGdO8QEfVnIEr6',
                'profile_photo_path' => 'profile-photos/y4owKt11TivjYSAWEeAqiWTNxE9F19bFY5RlsYWz.jpg',
                'remember_token' => NULL,
                'reputation' => 5,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2022-02-25 18:30:11',
            ),
            1 => 
            array (
                'airdrop' => 508,
                'created_at' => '2022-02-20 00:27:33',
                'current_team_id' => 1,
                'email' => 'richard@piedpiper.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'Richard Hendricks',
                'password' => '$2y$10$F.a4NGVv20pKqucVzdGgaO.XCEcHPGEhDG1oLDytGdO8QEfVnIEr6',
                'profile_photo_path' => 'profile-photos/MBrxOi6jTL8anNWQVqxho3nO9zn4NoZTBeVdtTK4.jpg',
                'remember_token' => NULL,
                'reputation' => 508,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2022-03-14 19:02:30',
            ),
            2 => 
            array (
                'airdrop' => 0,
                'created_at' => '2022-02-20 00:35:55',
                'current_team_id' => 1,
                'email' => 'gilfoyle@piedpiper.com',
                'email_verified_at' => NULL,
                'id' => 3,
                'name' => 'Bertram Gilfoyle',
                'password' => '$2y$10$F.a4NGVv20pKqucVzdGgaO.XCEcHPGEhDG1oLDytGdO8QEfVnIEr6',
                'profile_photo_path' => 'profile-photos/Fn0doJuQM1cer9jhiM7BhU0SStJ7fGZn3l6mXfie.jpg',
                'remember_token' => NULL,
                'reputation' => 2,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2022-02-20 00:39:22',
            ),
            3 => 
            array (
                'airdrop' => 0,
                'created_at' => '2022-02-20 00:40:25',
                'current_team_id' => 1,
                'email' => 'dinesh@piedpiper.com',
                'email_verified_at' => NULL,
                'id' => 4,
                'name' => 'Dinesh Chugtai',
                'password' => '$2y$10$F.a4NGVv20pKqucVzdGgaO.XCEcHPGEhDG1oLDytGdO8QEfVnIEr6',
                'profile_photo_path' => 'profile-photos/nMCfbucZmBDr81aOCfLcMD4R2ajqlRxyZurCJ8ZE.jpg',
                'remember_token' => NULL,
                'reputation' => 1,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2022-02-20 00:41:44',
            ),
            4 => 
            array (
                'airdrop' => 0,
                'created_at' => '2022-02-20 00:42:28',
                'current_team_id' => 1,
                'email' => 'jared@piedpiper.com',
                'email_verified_at' => NULL,
                'id' => 5,
                'name' => 'Jared Dunn',
                'password' => '$2y$10$F.a4NGVv20pKqucVzdGgaO.XCEcHPGEhDG1oLDytGdO8QEfVnIEr6',
                'profile_photo_path' => 'profile-photos/5WuemlaG20BYBXo66zDJFf9L8SouUteKFdQMbJTE.png',
                'remember_token' => NULL,
                'reputation' => 1,
                'two_factor_recovery_codes' => NULL,
                'two_factor_secret' => NULL,
                'updated_at' => '2022-02-20 00:51:41',
            ),
        ));
        
        
    }
}