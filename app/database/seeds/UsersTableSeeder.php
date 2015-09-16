<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		Sentry::register([
			'email'=> '826308409@qq.com',
			'username' => 'admin',
			'phone' => '132478888882',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>'666666',
			'info'=>'简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体',
			'role_id' => 3,
			'activated' => 1
		]);

		Sentry::register([
			'email'=> '82630849@qq.com',
			'username' => 'tiger1',
			'phone' => '13247888888',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>'666666',
			'info'=>'简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体',
			'role_id' => 2,
			'activated' => 1
		]);

		Sentry::register([
			'email'=> '82608409@qq.com',
			'username' => 'tiger2',
			'phone' => '13247888887',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'password' =>'666666',
			'info'=>'简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体',
			'role_id' => 2,
			'activated' => 1
		]);

		Sentry::register([
			'email'=> '828409@qq.com',
			'username' => 'tiger3',
			'phone' => '13247888884',
			'avatar' => 'http://7xk6xh.com1.z0.glb.clouddn.com/avatar.png',
			'info'=>'简介，即简明扼要的介绍。是当事人全面而简洁地介绍情况的一种书面表达方式，它是应用写作学研究的一种日常应用文体',
			'password' =>'666666',
			'role_id' => 2,
			'activated' => 1
		]);


	}

}