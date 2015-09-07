<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostersTableSeeder extends Seeder {

	public function run()
	{

		Poster::create([
			'photo_url' =>  'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'info_url'=> '1',//id 号
			'daily_id'=> '0'
		]);
		Poster::create([
			'photo_url' =>  'http://7xl6gj.com1.z0.glb.clouddn.com/19.3.jpg',
			'info_url'=> '2',
			'daily_id'=> '0'
		]);
		Poster::create([
			'photo_url' =>  'http://7xl6gj.com1.z0.glb.clouddn.com/19.4.jpg',
			'info_url'=> '3',
			'daily_id'=> '0'
		]);
		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'info_url'=> '4',
			'daily_id'=> '1'		
		]);
		Poster::create([
			'photo_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'info_url'=> '5',
			'daily_id'=> '1'		
		]);

	}

}