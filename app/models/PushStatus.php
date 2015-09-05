<?php

class PushStatus extends Eloquent{
	protected $table = 'push_status';

	protected $fillable = array(
			'user_id',
			'status'
		);

}