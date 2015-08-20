<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GiftFocusTableSeeder extends Seeder {

	public function run()
	{
		GiftFocus::create([
			'gift_id'=>1,
			'user_id' =>1
		]);
		GiftFocus::create([
			'gift_id'=>1,
			'user_id' =>2
		]);
		GiftFocus::create([
			'gift_id'=>1,
			'user_id' =>3
		]);
		GiftFocus::create([
			'gift_id'=>1,
			'user_id' =>4
		]);
	}

}