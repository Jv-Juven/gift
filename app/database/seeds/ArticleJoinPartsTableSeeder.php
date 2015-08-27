<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinPartsTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinPart::create([
			'join_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'type' =>'url'
		]);

		ArticleJoinPart::create([
			'join_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'type' =>'url'
		]);

		ArticleJoinPart::create([
			'join_id' => 3,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 3,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'type' =>'url'
		]);

	}

}