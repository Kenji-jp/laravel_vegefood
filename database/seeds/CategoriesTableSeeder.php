<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->delete();
        $categories_seeds = [
            [
                'category_name' => 'Vegetables',
                'status'        => '1'
            ],
            [
                'category_name' => 'Fruits',
                'status'        => '1'
            ],
            [
                'category_name' => 'Juices',
                'status'        => '1'
            ],
            [
                'category_name' => 'Dried',
                'status'        => '1'
            ],
        ];
        foreach($categories_seeds as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
