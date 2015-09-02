<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlePartsTableSeeder extends Seeder {

	public function run()
	{

		ArticlePart::create([
			'article_id' => 1,
			'content' => '我是第一段',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'type' => 'url'
		]);
		ArticlePart::create([
			'article_id' => 1,
			'content' => '我是第二段',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'type' => 'url'
		]);
		ArticlePart::create([
			'article_id' => 2,
			'content' => '我是第一段',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'type' => 'url'
		]);
		ArticlePart::create([
			'article_id' => 2,
			'content' => '我是第二段',
			'type' => 'text'
		]);

		ArticlePart::create([
			'article_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.5.jpg',
			'type' => 'url'
		]);

	}

}