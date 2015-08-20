<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostersTableSeeder extends Seeder {

	public function run()
	{

		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/Bitmap33@3x.png'
			'info_url'=> '/home/topic'
		]);
		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/Bitmap33@3x.png'
			'info_url'=> '/home/topic'
		]);
		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/Bitmap33@3x.png'
			'info_url'=> '/home/topic'
		]);
		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/Bitmap33@3x.png'
			'info_url'=> '/home/topic'
		]);

	}

}