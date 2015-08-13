<?php

class TJoinFocus extends Eloquent{
	protected $table = 't_join_focus';

	protected $fillable = array(
		'user_id',
		't_join_id'
		);
}