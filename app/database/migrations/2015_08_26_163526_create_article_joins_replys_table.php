<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleJoinsReplysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_join_replys', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('com_id')->unsigned()->index('com_id');
			$table->integer('sender_id')->unsigned()->index('sender_id');
			$table->integer('receiver_id')->unsigned()->index('receiver_id');
			$table->string('content');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_join_replys');
	}

}
