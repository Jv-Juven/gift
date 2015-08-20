<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TopicsTableSeeder extends Seeder {

	public function run()
	{
	
		Topic::create([
			'title'=>'这里是主题主题',
			'content' => '安装完 Laravel 之后，首先需要做的事情就是为你的应用程序设置一个随机字符串作为整个应用的 key（用于加密）。如果你是通过 Composer 安装的 Laravel，这个 key 可能已经通过 key:generate 指令自动为你设置好了。',
			'topic_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/zhuantiyijian_pic2@3x.png',
			'scan_num' => '19289',
			'focus_num' => '2828'
		]);
		Topic::create([
			'title'=>'这里是主题主题',
			'content' => '安装完 Laravel 之后，首先需要做的事情就是为你的应用程序设置一个随机字符串作为整个应用的 key（用于加密）。如果你是通过 Composer 安装的 Laravel，这个 key 可能已经通过 key:generate 指令自动为你设置好了。',
			'topic_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/zhuantiyijian_pic2@3x.png',
			'scan_num' => '19289',
			'focus_num' => '2828'
		]);
		Topic::create([
			'title'=>'这里是主题主题',
			'content' => '安装完 Laravel 之后，首先需要做的事情就是为你的应用程序设置一个随机字符串作为整个应用的 key（用于加密）。如果你是通过 Composer 安装的 Laravel，这个 key 可能已经通过 key:generate 指令自动为你设置好了。',
			'topic_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/zhuantiyijian_pic2@3x.png',
			'scan_num' => '19289',
			'focus_num' => '2828'
		]);
		Topic::create([
			'title'=>'这里是主题主题',
			'content' => '安装完 Laravel 之后，首先需要做的事情就是为你的应用程序设置一个随机字符串作为整个应用的 key（用于加密）。如果你是通过 Composer 安装的 Laravel，这个 key 可能已经通过 key:generate 指令自动为你设置好了。',
			'topic_url' => 'http://7xl6gj.com1.z0.glb.clouddn.com/zhuantiyijian_pic2@3x.png',
			'scan_num' => '19289',
			'focus_num' => '2828'
		]);
	}

}