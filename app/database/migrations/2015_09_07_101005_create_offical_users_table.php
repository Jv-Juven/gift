<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficalUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offical_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->integer('offical_id')->unsigned()->index('offical_id');
			$table->integer('status')->default(0);//是否被读:0=没有；1=已读
			$table->integer('is_delete')->default(0);//用户是否删除:0=没有；1=已从通知栏删除
			$table->timestamps();

			$table                          
				->foreign('offical_id')
				->references('id')->on('offical_notices') 
				->onDelete('cascade')
				->onUpdate('cascade');
			$table                          
				->foreign('user_id')
				->references('id')->on('users') 
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
		Schema::drop('offical_users');
	}

}
