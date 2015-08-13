<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftPhotoIntrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{			//礼物图文介绍
		Schema::create('gift_photo_intros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gift_id')->unsigned()->index('gift_id');//礼物id
			$table->string('url');//图文介绍
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
		Schema::drop('gift_photo_intros');
	}

}
