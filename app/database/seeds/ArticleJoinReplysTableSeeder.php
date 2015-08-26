<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinReplysTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinReply::create([
			'com_id' =>1,
			'sender_id' => 1,
			'receiver_id'=> 1,
			'content' => '我要评论我自己'
		]);
	}

}