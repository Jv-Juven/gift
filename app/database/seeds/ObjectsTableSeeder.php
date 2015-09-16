<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ObjectsTableSeeder extends Seeder {

	public function run()
	{
			Object::create([
				'object_id'=>1,
				'_class'=>'女友'
			]);
			Object::create([
				'object_id'=>2,
				'_class'=>'闺密'
			]);
			Object::create([
				'object_id'=>3,
				'_class'=>'老师'
			]);
			Object::create([
				'object_id'=>4,
				'_class'=>'母亲'
			]);
			Object::create([
				'object_id'=>5,
				'_class'=>'朋友'
			]);
			Object::create([
				'object_id'=>6,
				'_class'=>'父亲'
			]);
			Object::create([
				'object_id'=>7,
				'_class'=>'女性'
			]);
			Object::create([
				'object_id'=>8,
				'_class'=>'男友'
			]);
			Object::create([
				'object_id'=>9,
				'_class'=>'基友'
			]);
			Object::create([
				'object_id'=>10,
				'_class'=>'情人'
			]);
			Object::create([
				'object_id'=>11,
				'_class'=>'情人'
			]);
	}

}