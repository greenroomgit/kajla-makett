<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'administrator',
                'password' => '$2y$10$/7dJcmPR.e7lvi1.YlY3PuSrFPm4tC.bcWZq7vqwXqoUDi/JHYWYK',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => 'iqD4Eo0pFSXQ9ww0FS76ddmluFR4KRLgsjDBBEDNSjB0HbN9Jw3z341L1bDY',
                'created_at' => '2020-05-07 14:18:26',
                'updated_at' => '2020-05-07 14:18:26',
            ),
        ));
        
        
    }
}