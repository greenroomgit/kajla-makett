<?php

use Illuminate\Database\Seeder;

class GuideStepsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('guide_steps')->delete();
        
        \DB::table('guide_steps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '1. lépés',
                'description' => 'Töltsd fel',
                'link' => 'http://upload',
                'picture' => 'images/d95bd6e099068ff72d9508086af0872b.jpg',
                'created_at' => '2020-05-07 15:05:00',
                'updated_at' => '2020-05-07 15:45:34',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '2. lépés',
                'description' => 'valami más dessc',
                'link' => 'https://asdcasdc',
                'picture' => 'images/3e9edb27f55af013dff426669873bfa2.jpg',
                'created_at' => '2020-05-07 15:46:55',
                'updated_at' => '2020-05-07 15:46:55',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Step 3',
                'description' => 'Step 3 description',
                'link' => 'http://ssssss',
                'picture' => 'images/ad23e0898646cf7095f11743dd614126.jpg',
                'created_at' => '2020-05-07 15:47:43',
                'updated_at' => '2020-05-07 15:47:43',
            ),
        ));
        
        
    }
}