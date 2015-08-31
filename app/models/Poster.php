<?php

class Poster extends Eloquent{

	protected $table = 'posters';

	protected $fillable = array(
		'photo_url',
		'info_url',
		'daily_id'
	);
}