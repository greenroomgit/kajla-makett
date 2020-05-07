<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'youtube_id' => 'xLs-K6kjIfM',
                'caption' => 'Hol vagy, Kajla? - Utazz díjmentesen vonattal!',
                'created_at' => '2020-05-07 14:20:55',
                'updated_at' => '2020-05-07 14:20:55',
            ),
            1 => 
            array (
                'id' => 2,
                'youtube_id' => 'uORPWelGKtE',
                'caption' => 'Füzér Vára',
                'created_at' => '2020-05-07 14:21:20',
                'updated_at' => '2020-05-07 14:21:20',
            ),
        ));
        
        
    }
}