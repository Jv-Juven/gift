<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GiftFocusTableSeeder extends Seeder {

	public function run()
	{
		$i = 0 ;
		
		for($i=0; $i<200; $i++)
		{
			GiftFocus::create([
				'gift_id'=>$i+1,
				'user_id' =>1
			]);
		}
		// GiftFocus::create([
		// 	'gift_id'=>2,
		// 	'user_id' =>2
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>3,
		// 	'user_id' =>3
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>4,
		// 	'user_id' =>4
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>5,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>6,
		// 	'user_id' =>2
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>7,
		// 	'user_id' =>3
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>8,
		// 	'user_id' =>4
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>9,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>10,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>11,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>12,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>13,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>14,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>15,
		// 	'user_id' =>1
		// ]);
		// GiftFocus::create([
		// 	'gift_id'=>16,
		// 	'user_id' =>1
		// ]);
	}
}
