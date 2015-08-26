<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlePartsTableSeeder extends Seeder {

	public function run()
	{

		ArticlePart::create([
			'article_id' => 1,
			'content' => '如何搞定',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'type' => 'url'
		]);

		ArticlePart::create([
			'article_id' => 2,
			'content' => '如何征服处女座',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/2.jpg',
			'type' => 'url'
		]);

	}

}