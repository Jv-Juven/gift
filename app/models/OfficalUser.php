<?php 

class OfficalUser extends Eloquent{

		protected $table = 'offical_users';

		protected $fillable = array(
			'offical_id',
			'user_id',
			'status',
			'is_delete'
		);

}