<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//专题活动
		Schema::create('topics', function(Blueprint $table)
		{
			$table->increments('id');
			// $table->integer('user_id')->unsigned()->index('user_id');//此字段暂时不用，以备二期扩展
			$table->string('title');//题目
			$table->string('content');//内容
			$table->string('topic_url');//专题图片
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('join_num')->nullable();//参与话题人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->timestamps();

			// $table                          
			// 	->foreign('user_id')
			// 	->references('id')->on('users') 
			// 	->onDelete('cascade')
			// 	->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
	}

}
