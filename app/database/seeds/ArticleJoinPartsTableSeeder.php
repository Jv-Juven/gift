<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinPartsTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinPart::create([
			'join_id' => 1,
			'content' => '采用加厚棉麻混纺布料，天然的做旧感使表面纹理优雅而又细腻，闪瞎眼的土豪金色奢华又神秘，价格却是十分亲民呢~' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 1,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg',
			'type' =>'url'
		]);

		ArticleJoinPart::create([
			'join_id' => 2,
			'content' => '采用加厚棉麻混纺布料，天然的做旧感使表面纹理优雅而又细腻，闪瞎眼的土豪金色奢华又神秘，价格却是十分亲民呢~' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 2,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.3.jpg',
			'type' =>'url'
		]);

		ArticleJoinPart::create([
			'join_id' => 3,
			'content' => '采用加厚棉麻混纺布料，天然的做旧感使表面纹理优雅而又细腻，闪瞎眼的土豪金色奢华又神秘，价格却是十分亲民呢~' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 3,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.4.jpg',
			'type' =>'url'
		]);

		ArticleJoinPart::create([
			'join_id' => 4,
			'content' => '采用加厚棉麻混纺布料，天然的做旧感使表面纹理优雅而又细腻，闪瞎眼的土豪金色奢华又神秘，价格却是十分亲民呢~' ,
			'type' =>'text'
		]);

		ArticleJoinPart::create([
			'join_id' => 4,
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.4.jpg',
			'type' =>'url'
		]);

	}

}