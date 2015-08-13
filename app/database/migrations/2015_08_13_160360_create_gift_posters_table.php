<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftPostersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//礼品海报——礼品详情页展示用
		Schema::create('gift_posters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gift_id')->unsigned()->index('gift_id');//礼物id
			$table->string('url');//礼物图片url
			$table->timestamps();

			$table                          
				->foreign('gift_id')
				->references('id')->on('gifts') 
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
		Schema::drop('gift_posters');
	}

}
