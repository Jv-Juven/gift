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
	{				 //专题回复
		Schema::create('topic_replys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned()->index('sender_id');
			$table->integer('receiver_id')->unsigned()->index('receiver_id');
			$table->integer('topic_com_id')->unsigned()->index('topic_com_id');
			$table->integer('topic_id')->unsigned()->index('topic_id');
			$table->timestamps();

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
			$table                          
				->foreign('topic_id')
				->references('id')->on('topics') 
				->onDelete('cascade')
				->onUpdate('cascade');
			$table                          
				->foreign('topic_com_id')
				->references('id')->on('topic_coms') 
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
