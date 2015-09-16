<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PricesTableSeeder extends Seeder {

	public function run()
	{
			Price::create([
				'price_id'	=> 1,
				'low_price'	=> 0,
				'high_price'=> 50
			]);
			Price::create([
				'price_id'	=> 2,
				'low_price'	=> 50,
				'high_price'=> 100
			]);
			Price::create([
				'price_id'	=> 3,
				'low_price'	=> 100,
				'high_price'=> 300
			]);

			Price::create([
				'price_id'	=> 4,
				'low_price'	=> 300,
				'high_price'=> 500
			]);

			Price::create([
				'price_id'	=> 5,
				'low_price'	=> 500,
				'high_price'=> 1000
			]);
			Price::create([
				'price_id'	=> 1,
				'low_price'	=> 0,
				'high_price'=> 50
			]);
			Price::create([
				'price_id'	=> 2,
				'low_price'	=> 50,
				'high_price'=> 100
			]);
			Price::create([
				'price_id'	=> 3,
				'low_price'	=> 100,
				'high_price'=> 300
			]);

			Price::create([
				'price_id'	=> 4,
				'low_price'	=> 300,
				'high_price'=> 500
			]);

			Price::create([
				'price_id'	=> 5,
				'low_price'	=> 500,
				'high_price'=> 1000
			]);
			Price::create([
				'price_id'	=> 5,
				'low_price'	=> 500,
				'high_price'=> 1000
			]);

	}

}