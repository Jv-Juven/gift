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

		$this->call('TopicsTableSeeder');
		$this->call('GiftsTableSeeder');
		$this->call('GiftPostersTableSeeder');
		$this->call('GiftPhotoIntrosTableSeeder');
		$this->call('PostersTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('GiftFocusTableSeeder');
		$this->call('SearchTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('ArticlePartsTableSeeder');
		$this->call('ArticleJoinsTableSeeder');
		$this->call('ArticleJoinPartsTableSeeder');
		$this->call('ArticleJoinComsTableSeeder');
		$this->call('ArticleJoinReplysTableSeeder');
		$this->call('CharactorsTableSeeder');
		$this->call('ObjectsTableSeeder');
		$this->call('PricesTableSeeder');
		$this->call('ScenesTableSeeder');
	}

}
