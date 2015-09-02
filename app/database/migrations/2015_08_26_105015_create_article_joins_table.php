<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleJoinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//参与话题内容
		Schema::create('article_joins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index('article_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('join_num')->nullable();//评论参与话题人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->timestamps();

			$table                          
				->foreign('article_id')
				->references('id')->on('articles') 
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
		Schema::drop('article_joins');
	}

}
