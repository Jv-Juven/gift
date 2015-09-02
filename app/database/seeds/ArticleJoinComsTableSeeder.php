<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinComsTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinCom::create([
			'sender_id'=>2,
			'receiver_id'=>1,
			'join_id' => 1,
			'content' => '我灯儿的飘，我灯二的飘飘飘飘飘',
		]);
		ArticleJoinCom::create([
			'sender_id'=>3,
			'receiver_id'=>2,
			'join_id' => 2,
			'content' => '我灯儿的飘，我灯二的飘飘飘飘飘',
		]);
		ArticleJoinCom::create([
			'sender_id'=>4,
			'receiver_id'=>3,
			'join_id' => 3,
			'content' => '我灯儿的飘，我灯二的飘飘飘飘飘',
		]);
		ArticleJoinCom::create([
			'sender_id'=>1,
			'receiver_id'=>4,
			'join_id' => 4,
			'content' => '我灯儿的飘，我灯二的飘飘飘飘飘',
		]);
	}

}