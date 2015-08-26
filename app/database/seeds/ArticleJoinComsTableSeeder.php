<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinComsTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinCom::create([
			'user_id' => 1,
			'join_id' => 1,
			'content' => '我灯儿的飘，我灯二的飘飘飘飘飘',
		]);

	}

}