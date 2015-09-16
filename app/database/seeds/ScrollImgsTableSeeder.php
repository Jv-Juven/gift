<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScrollImgsTableSeeder extends Seeder {

	public function run()
	{
			ScrollImg::create([
					'img'=>'http://7xl6gj.com1.z0.glb.clouddn.com/slide-img02.jpg'
			]);
			ScrollImg::create([
					'img'=>'http://7xl6gj.com1.z0.glb.clouddn.com/slide-img03.jpg'
			]);
			ScrollImg::create([
					'img'=>'http://7xl6gj.com1.z0.glb.clouddn.com/slide-img04.jpg'
			]);
	}

}