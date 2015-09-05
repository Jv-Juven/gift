<?php

class JoinFocus extends Eloquent{
	protected $table = 'join_focus';

	protected $fillable = array(
			'user_id',
			'join_id'
		);

}