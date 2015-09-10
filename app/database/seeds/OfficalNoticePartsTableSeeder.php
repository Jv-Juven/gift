<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OfficalNoticePartsTableSeeder extends Seeder {

	public function run()
	{
		OfficalNoticePart::create([
			'offical_id' => 1,
			'type'=>'text',
			'content' => '官方通知，请小卡萨吉和事杀菌'
		]);
		OfficalNoticePart::create([
			'offical_id' => 1,
			'type'=>'url',
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		]);

		OfficalNoticePart::create([
			'offical_id' => 2,
			'type'=>'text',
			'content' => '官方通知，请小卡萨吉和事杀菌'
		]);
		OfficalNoticePart::create([
			'offical_id' => 2,
			'type'=>'url',
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		]);

		OfficalNoticePart::create([
			'offical_id' => 3,
			'type'=>'text',
			'content' => '官方通知，请小卡萨吉和事杀菌'
		]);
		OfficalNoticePart::create([
			'offical_id' => 3,
			'type'=>'url',
			'content' => 'http://7xl6gj.com1.z0.glb.clouddn.com/19.2.jpg'
		]);
	}

}