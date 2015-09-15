<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleFocusTableSeeder extends Seeder {

	public function run()
	{
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>1
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>2
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>3
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>4
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>5
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>6
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>7
		]);
		ArticleFocus::create([
			'user_id'=>1,
			'article_id'=>8
		]);

	}

}