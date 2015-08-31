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
			$table->integer('com_id')->unsigned()->index('com_id');//被评论的id
			$table->integer('sender_id')->unsigned()->index('sender_id');
			$table->integer('receiver_id')->unsigned()->index('receiver_id');
			$table->string('content');
			$table->integer('status')->default(0);//是否被读:0=没有；1=已读
			$table->integer('is_delete')->default(0);//用户是否删除:0=没有；1=已从通知栏删除
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
				->foreign('com_id')
				->references('id')->on('article_join_coms') 
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
		Schema::drop('article_join_replys');
	}

}
