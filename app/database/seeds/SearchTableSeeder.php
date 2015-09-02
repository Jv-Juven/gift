<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SearchTableSeeder extends Seeder {

	public function run()
	{
		Search::create([
			'label' => '阿登成人专场',
			'count' => 12
		]);

		Search::create([
			'label' => '武辉成人专场',
			'count' => 1434
		]);

		Search::create([
			'label' => '裕源成人专场',
			'count' => 344
		]);

		Search::create([
			'label' => '壁鸿成人专场',
			'count' => 112
		]);

		Search::create([
			'label' => '坚哥成人专场',
			'count' => 888
		]);

		Search::create([
			'label' => '电影',
			'count' => 88
		]);

		Search::create([
			'label' => '牛人',
			'count' => 1188
		]);

		Search::create([
			'label' => '海贼王',
			'count' => 17
		]);

		Search::create([
			'label' => '面包',
			'count' => 166
		]);

		Search::create([
			'label' => '牛奶',
			'count' => 14
		]);

		Search::create([
			'label' => '咖啡',
			'count' => 1
		]);
	}

}