<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		User::create([
			'email'=> '826308409@qq.com',
			'username' => 'admin',
			'phone' => 132478888882,
			'avatar' => 'http://7xl6gj.com1.z0.glb.clouddn.com/0000.png',
			'password' =>Hash::make(666666),
			'role_id' => 3
		]);

		User::create([
			'email'=> '82630849@qq.com',
			'username' => 'tiger1',
			'phone' => 13247888888,
			'avatar' => 'http://7xl6gj.com1.z0.glb.clouddn.com/0000.png',
			'password' =>Hash::make(666666),
			'role_id' => 2
		]);

		User::create([
			'email'=> '82608409@qq.com',
			'username' => 'tiger2',
			'phone' => 13247888887,
			'avatar' => 'http://7xl6gj.com1.z0.glb.clouddn.com/0000.png',
			'password' =>Hash::make(666666),
			'role_id' => 2
		]);

		User::create([
			'email'=> '828409@qq.com',
			'username' => 'tiger3',
			'phone' => 13247888884,
			'avatar' => 'http://7xl6gj.com1.z0.glb.clouddn.com/0000.png',
			'password' =>Hash::make(666666),
			'role_id' => 2
		]);


	}

}