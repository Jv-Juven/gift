<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleJoinPartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_join_parts', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->integer('join_id')->unsigned()->index('join_id');
			$table->string('content');
			$table->string('type');
			$table->timestamps();

			$table                          
				->foreign('join_id')
				->references('id')->on('article_joins') 
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
		Schema::drop('article_join_parts');
	}

}
