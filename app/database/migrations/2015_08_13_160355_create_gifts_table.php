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
			$table->string('title');//礼物名
			$table->string('price');//价格
			$table->string('content');//内容
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->integer('scene_id')->nullable();//场景编号
			$table->integer('object_id')->nullable();//对象编号
			$table->integer('char_id')->nullable();//性格编号
			$table->timestamps();
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
