<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinsTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoin::create([
			'article_id' => 1,
			'user_id' => 1,
			'scan_num' => 2332,
			'join_num' => 2323,
			'focus_num' => 33
		]);

		ArticleJoin::create([
			'article_id' => 1,
			'user_id' => 2,
			'scan_num' => 2332,
			'join_num' => 2323,
			'focus_num' => 33
		]);

		ArticleJoin::create([
			'article_id' => 2,
			'user_id' => 1,
			'scan_num' => 2332,
			'join_num' => 2323,
			'focus_num' => 33
		]);
		ArticleJoin::create([
			'article_id' => 2,
			'user_id' => 2,
			'scan_num' => 2332,
			'join_num' => 2323,
			'focus_num' => 33
		]);

	}

}