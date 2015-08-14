<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicJoinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//参与话题
		Schema::create('topic_joins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('topic_id');//话题id
			$table->integer('user_id')->unsigned()->index('user_id');//参与者id
			$table->string('content');//内容
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->integer('com_num')->nullable();//评论条数
			$table->timestamps();

			$table                          
				->foreign('topic_id')
				->references('id')->on('topics') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('user_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topic_joins');
	}

}
