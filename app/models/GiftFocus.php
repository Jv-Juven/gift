<?php

class GiftFocus extends Eloquent{
	protected $table = 'gift_focus';

	protected $fillable = array(
			'user_id',
			'gift_id'
		);

}