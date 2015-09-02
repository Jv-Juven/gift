<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//性格——礼品分类的一种方法
		Schema::create('charactors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('char_id');//性格编号
			$table->string('_class');//类名
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
		Schema::drop('charactors');
	}

}
