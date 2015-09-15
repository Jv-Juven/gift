<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GiftPostersTableSeeder extends Seeder {

	public function run()
	{
		for(i=0; i<200; i++)
		{
			GiftPoster::create([
				'gift_id' => i+1,
				'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
			]);
			
		}
		// GiftPoster::create([
		// 		'gift_id' => 1,
		// 		'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// 	]);
		// GiftPoster::create([
		// 	'gift_id' => 2,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/35-7.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 3,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 4,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);GiftPoster::create([
		// 	'gift_id' => 5,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/35-7.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 6,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/36-3.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 7,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/44-10.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 8,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 9,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/36-3.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 10,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 11,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/36-3.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 12,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 13,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/36-3.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 14,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 15,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		// ]);
		// GiftPoster::create([
		// 	'gift_id' => 16,
		// 	'url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/44-10.jpg'
		// ]);
	}

}