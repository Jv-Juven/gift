<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicReplyPartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_reply_parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_reply_id')->unsigned()->index('topic_reply_id');
			$table->string('content')->nullable();
			$table->string('type')->nullable();
			$table->timestamps();

			$table                          
				->foreign('topic_reply_id')
				->references('id')->on('topic_replys') 
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
		Schema::drop('topic_reply_parts');
	}

}
