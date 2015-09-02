<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//场景——礼品分类的一种方法
		Schema::create('scenes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('scene_id');//场景编号
			$table->string('class');//名字
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
		Schema::drop('scenes');
	}

}
