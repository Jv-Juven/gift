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
			$table->integer('info_url')->unsigned()->index('info_url');//礼物ID
			$table->integer('daily_id')->default(0);//0=新品推荐；1=每日一荐
			$table->timestamps();
		});

		// $table                          
		// 		->foreign('info_url')
		// 		->references('id')->on('gifts') 
		// 		->onDelete('cascade')
		// 		->onUpdate('cascade');
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
