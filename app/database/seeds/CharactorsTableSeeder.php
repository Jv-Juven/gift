<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CharactorsTableSeeder extends Seeder {

	public function run()
	{
			Charactor::create([
				'char_id'=>1,
				'_class' =>'文艺'
			]);
			Charactor::create([
				'char_id'=>2,
				'_class' =>'成熟'
			]);
			Charactor::create([
				'char_id'=>3,
				'_class' =>'理科男'
			]);
			Charactor::create([
				'char_id'=>4,
				'_class' =>'直男'
			]);
			Charactor::create([
				'char_id'=>5,
				'_class' =>'宅男'
			]);
			Charactor::create([
				'char_id'=>6,
				'_class' =>'妇女'
			]);
			Charactor::create([
				'char_id'=>7,
				'_class' =>'四眼仔'
			]);
			Charactor::create([
				'char_id'=>8,
				'_class' =>'萌萌嗒'
			]);
			Charactor::create([
				'char_id'=>9,
				'_class' =>'气质型'
			]);
			Charactor::create([
				'char_id'=>10,
				'_class' =>'御姐'
			]);
			Charactor::create([
				'char_id'=>11,
				'_class' =>'御姐'
			]);
	}

}