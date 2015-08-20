<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostersTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//首页海报—滚动页，每天的新推荐
		Schema::create('posters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('photo_url')->nullable();//礼物图片链接
			$table->string('info_url')->nullable();//礼物详情ID
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
		Schema::drop('posters');
	}

}
