<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('TopicsTableSeeder');
		// $this->call('GiftsTableSeeder');
		$this->call('GiftPostersTableSeeder');
	}

}
