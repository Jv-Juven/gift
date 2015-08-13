<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicComsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//参与话题的评论
		Schema::create('topic_coms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('user_id');//用户iid
			$table->integer('topic_id')->unsigned()->index('topic_id');//话题id
			$table->integer('t_join_id')->unsigned()->index('t_join_id');//参与话题id
			$table->string('content');//内容
			$table->intger('reply_num')->nullable();//回复人数
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

			$table                          
				->foreign('t_join_id')
				->references('id')->on('topic_joins') 
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
		Schema::drop('topic_coms');
	}

}
