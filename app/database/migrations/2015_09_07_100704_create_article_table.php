<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{				//话题
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->integer('scan_num')->nullable();//浏览人数
			$table->integer('join_num')->nullable();//参与话题人数
			$table->integer('focus_num')->nullable();//收藏人数
			$table->integer('hot_offical')->default(0);//0=官方,1=热门,
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
		Schema::drop('articles');
	}

}
