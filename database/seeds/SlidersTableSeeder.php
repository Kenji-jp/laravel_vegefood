<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->delete();
        $sliders_seeds = [
            [
                'slider_image'      => 'bg_1.jpg',
                'description_1'     => 'We served fresh vegetable and fruit',
                'description_2'     => 'we delivered organic vegetable and fruit',
                'status'            => '1'
            ],
            [
                'slider_image'      => 'bg_2.jpg',
                'description_1'     => '100% fresh and organic foods',
                'description_2'     => 'we delivered organic vegetable and fruit',
                'status'            => '1'
            ],
            [
                'slider_image'      => 'bg_3.jpg',
                'description_1'     => 'Thank you for watching me',
                'description_2'     => 'Tomita Kenji',
                'status'            => '1'
            ]
        ];
        foreach($sliders_seeds as $slider) {
            DB::table('sliders')->insert($slider);
        }
    }
}
