<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
		Article::create([
			'title' => '圈子话题1',
			'scan_num' => 912,
			'join_num' => 212,
			'focus_num' => 1334
		]);

		Article::create([
			'title' => '圈子话题2',
			'scan_num' => 33,
			'join_num' => 3333,
			'focus_num' => 1234
		]);

		Article::create([
			'title' => '圈子话题3',
			'scan_num' => 912,
			'join_num' => 212,
			'focus_num' => 1334
		]);

		Article::create([
			'title' => '圈子话题4',
			'scan_num' => 33,
			'join_num' => 3333,
			'focus_num' => 1234
		]);

	}

}