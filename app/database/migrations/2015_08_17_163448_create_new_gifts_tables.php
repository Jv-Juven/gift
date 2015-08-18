<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewGiftsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//新品活动
		Schema::create('new_gifts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('photo_url')->nullable();//礼物图片链接
			$table->string('info_url')->nullable();//礼物详情链接
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('new_gifts');
	}

}
