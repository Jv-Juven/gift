<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScenesTableSeeder extends Seeder {

	public function run()
	{
			Scene::create([
				'scene_id'=>1,
				'_class'=>'生日'
			]);
			Scene::create([
				'scene_id'=>2,
				'_class'=>'毕业'
			]);
			Scene::create([
				'scene_id'=>3,
				'_class'=>'教师节'
			]);
			Scene::create([
				'scene_id'=>4,
				'_class'=>'母亲节'
			]);
			Scene::create([
				'scene_id'=>5,
				'_class'=>'求婚'
			]);
			Scene::create([
				'scene_id'=>6,
				'_class'=>'父情节'
			]);
			Scene::create([
				'scene_id'=>7,
				'_class'=>'圣诞节'
			]);
			Scene::create([
				'scene_id'=>8,
				'_class'=>'乔迁'
			]);
			Scene::create([
				'scene_id'=>9,
				'_class'=>'新年'
			]);
	}

}