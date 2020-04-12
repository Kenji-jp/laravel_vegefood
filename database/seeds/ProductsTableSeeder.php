<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->delete();
        $products_seeds = [
            [
                'product_name'      => 'Bel Pepper',
                'product_price'     => '130',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-1.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Straw Berry',
                'product_price'     => '60',
                'product_category'  => 'Fruit',
                'product_image'     => 'product-2.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Green Beans',
                'product_price'     => '90',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-3.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Purple Cabbage',
                'product_price'     => '160',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-4.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Tomatoe',
                'product_price'     => '120',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-5.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Brocolli',
                'product_price'     => '130',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-6.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Carrots',
                'product_price'     => '80',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-7.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Fruit Juice',
                'product_price'     => '130',
                'product_category'  => 'Juices',
                'product_image'     => 'product-8.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Onion',
                'product_price'     => '110',
                'product_category'  => 'Vegetables',
                'product_image'     => 'product-9.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Apple',
                'product_price'     => '130',
                'product_category'  => 'Fruits',
                'product_image'     => 'product-10.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Garlic',
                'product_price'     => '90',
                'product_category'  => 'Dried',
                'product_image'     => 'product-11.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ],
            [
                'product_name'      => 'Chilli',
                'product_price'     => '100',
                'product_category'  => 'Dried',
                'product_image'     => 'product-12.jpg',
                'product_description' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'status'            => '1'
            ]
        ];
        foreach($products_seeds as $product) {
            DB::table('products')->insert($product);
        }
    }
}
