<?php

class NewGift extends Eloquent{
	protected $table = 'new_gifts';

	protected $fillable = array(
		'photo_url',
		'info_url'
	);
}