<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//话题各个部分
		Schema::create('article_parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index('article_id');
			$table->string('content');
			$table->string('type');
			$table->timestamps();

			$table                          
				->foreign('article_id')
				->references('id')->on('articles') 
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
		Schema::drop('article_parts');
	}

}
