<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleFocusTableSeeder extends Seeder {

	public function run()
	{
		$i = 0 ;
		for($i=0; $i<60; $i++)
		{
			ArticleFocus::create([
				'user_id'=>1,
				'article_id'=>$i+1
			]);
		}
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>2
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>3
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>4
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>5
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>6
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>7
		// ]);
		// ArticleFocus::create([
		// 	'user_id'=>1,
		// 	'article_id'=>8
		// ]);

	}

}