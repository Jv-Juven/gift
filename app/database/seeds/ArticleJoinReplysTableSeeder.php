<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticleJoinReplysTableSeeder extends Seeder {

	public function run()
	{
		ArticleJoinReply::create([
			'com_id' =>1,
			'sender_id' => 1,
			'receiver_id'=> 2,
			'content' => '阿登这是你评论的'
		]);
		ArticleJoinReply::create([
			'com_id' =>2,
			'sender_id' => 2,
			'receiver_id'=> 1,
			'content' => '阿登这是你评论的'
		]);
		ArticleJoinReply::create([
			'com_id' =>3,
			'sender_id' => 1,
			'receiver_id'=> 2,
			'content' => '阿登这是你评论的'
		]);
		// ArticleJoinReply::create([
		// 	'com_id' =>4,
		// 	'sender_id' => 2,
		// 	'receiver_id'=> 1,
		// 	'content' => '阿登这是你评论的'
		// ]);

		// ArticleJoinReply::create([
		// 	'com_id' =>1,
		// 	'sender_id' => 5,
		// 	'receiver_id'=> 1,
		// 	'content' => '阿登这是你评论的'
		// ]);

		// ArticleJoinReply::create([
		// 	'com_id' =>1,
		// 	'sender_id' => 5,
		// 	'receiver_id'=> 2,
		// 	'content' => '阿登这是你评论的'
		// ]);

		// ArticleJoinReply::create([
		// 	'com_id' =>1,
		// 	'sender_id' => 5,
		// 	'receiver_id'=> 3,
		// 	'content' => '阿登这是你评论的'
		// ]);

		// ArticleJoinReply::create([
		// 	'com_id' =>1,
		// 	'sender_id' => 5,
		// 	'receiver_id'=> 4,
		// 	'content' => '阿登这是你评论的'
		// ]);
	}

}