<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//对象——礼品其中一种分类方法
		Schema::create('objects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('object_id');//对象编号
			$table->string('class');//类名
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
		Schema::drop('objects');
	}

}
