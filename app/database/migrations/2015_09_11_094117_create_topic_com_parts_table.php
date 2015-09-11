<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicComPartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topic_com_parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_com_id')->unsigned()->index('topic_com_id');
			$table->string('content')->nullable();
			$table->string('type')->nullable();
			$table->timestamps();

			$table                          
				->foreign('topic_com_id')
				->references('id')->on('topic_coms') 
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
		Schema::drop('topic_com_parts');
	}

}
