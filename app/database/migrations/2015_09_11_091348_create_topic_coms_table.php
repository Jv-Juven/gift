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
	{						//专题评论
		Schema::create('topic_coms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->unsigned()->index('sender_id');
			$table->integer('topic_id')->unsigned()->index('topic_id');
			$table->timestamps();

			$table                          
				->foreign('sender_id')
				->references('id')->on('users') 
				->onDelete('cascade')
				->onUpdate('cascade');
			$table                          
				->foreign('topic_id')
				->references('id')->on('topics') 
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
