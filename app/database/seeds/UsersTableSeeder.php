<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{

		User::create([
			'email'=> '826308409@qq.com',
			'username' => 'admin',
			'password' =>Hash::make(666666),
			'role_id' => 3
		]);
	}

}