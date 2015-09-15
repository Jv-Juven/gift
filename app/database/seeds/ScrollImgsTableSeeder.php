<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScrollImgsTableSeeder extends Seeder {

	public function run()
	{
			ScrollImg::create([
					'img' => ''
			]);
	}

}