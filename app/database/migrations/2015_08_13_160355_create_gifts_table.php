<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//礼品
		Schema::create('gifts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('topic_id');//所属专题
			$table->string('title');//礼物名
			$table->decimal('price',10,2);//价格
			$table->string('content');//内容
			$table->string('gift_photo_intro');//图文介绍
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->integer('scene_id')->nullable();//场景编号
			$table->integer('object_id')->nullable();//对象编号
			$table->integer('char_id')->nullable();//性格编号
			$table->integer('price_id')->nullable(); //价格区间
			$table->string('taobao_url');//淘宝链接
			$table->timestamps();

			$table                          
				->foreign('topic_id')
				->references('id')->on('topics') 
				->onDelete('cascade')
				->onUpdate('cascade');

			// $table
			// 	->foreign('scene_id')
			// 	->references('id')->on('scenes') 
			// 	->onDelete('cascade')
			// 	->onUpdate('cascade');

			// $table
			// 	->foreign('object_id')
			// 	->references('id')->on('object') 
			// 	->onDelete('cascade')
			// 	->onUpdate('cascade');

			// $table
			// 	->foreign('char_id')
			// 	->references('id')->on('charactors') 
			// 	->onDelete('cascade')
			// 	->onUpdate('cascade');
		});
	}

	public function posters()
	{
		return $this->hasMany('GiftPoster', 'gift_id', 'id');
	}

	public function photo_intros()
	{
		return $this->hasMany('GiftPhotoIntro', 'gift_id', 'id');
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gifts');
	}

}
