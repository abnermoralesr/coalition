<?php

use Illuminate\Database\Seeder;
use \App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::create([
			'name' => 'CD',
			'slug' => str_slug('CD'),
			'stock' => 1,
			'created_by' => 1,
			'price' => 299.29,
		]);
        Product::create([
			'name' => 'PS VITA',
			'slug' => str_slug('PS VITA'),
			'stock' => 10,
			'created_by' => 1,
			'price' => 499.29,
		]);		
        Product::create([
			'name' => 'WALKMAN',
			'slug' => str_slug('WALKMAN'),
			'stock' => 5,
			'created_by' => 1,
			'price' => 199.82,
		]);					
    }
}
