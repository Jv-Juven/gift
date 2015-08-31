<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficalNoticePartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offical_notice_parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('offical_id')->unsigned()->index('offical_id');
			$table->string('type');//text＝文本；url＝链接
			$table->string('content');
			$table->timestamps();

			$table                          
				->foreign('offical_id')
				->references('id')->on('offical_notices') 
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
		Schema::drop('offical_notice_parts');
	}

}
