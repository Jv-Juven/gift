<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicReplysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//话题评论回复
		Schema::create('topic_replys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('topic_id');//话题id
			$table->integer('t_join_id')->unsigned()->index('t_join_id');//参与话题id
			$table->integer('t_com_id')->unsigned()->index('t_com_id');//话题评论id
			$table->integer('sender_id')->unsigned()->index('sender_id');//发送者id
			$table->integer('receiver_id')->unsigned()->index('receiver_id');//接受者id
			$table->string('content');//内容
			$table->timestamps();

			$table                          
				->foreign('topic_id')
				->references('id')->on('topics') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('t_join_id')
				->references('id')->on('topic_joins') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('t_com_id')
				->references('id')->on('topic_coms') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('sender_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');

			$table                          
				->foreign('receiver_id')
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
		Schema::drop('topic_replys');
	}

}
