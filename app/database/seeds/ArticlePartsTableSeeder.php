<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlePartsTableSeeder extends Seeder {

	public function run()
	{
		$i = 0 ;
		
		for($i=0; $i<60; $i++)
		{
			ArticlePart::create([
				'article_id' => $i+1,
				'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
				'type' => 'text'
			]);

			ArticlePart::create([
				'article_id' => $i+1,
				'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
				'type' => 'url'
			]);
			ArticlePart::create([
				'article_id' => $i+1,
				'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
				'type' => 'text'
			]);

			ArticlePart::create([
				'article_id' => $i+1,
				'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
				'type' => 'url'
			]);
		}
		// ArticlePart::create([
		// 	'article_id' => 2,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 2,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 2,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 2,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 3,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 3,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 3,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 3,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 4,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 4,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 4,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 4,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 5,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 5,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 5,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 5,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 6,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 6,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 6,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 6,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 7,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 7,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 7,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 7,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 8,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 8,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
		// ArticlePart::create([
		// 	'article_id' => 8,
		// 	'content' => '也许你有个暗恋许久的ta，就是不知道该如何开口，那么七夕情人节就是表白对好时机。有帮大家帮，送ta什么好呢？除某车话',
		// 	'type' => 'text'
		// ]);

		// ArticlePart::create([
		// 	'article_id' => 8,
		// 	'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
		// 	'type' => 'url'
		// ]);
	}

}