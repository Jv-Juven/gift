<?php

class About extends Eloquent{
	protected $table = 'about';

	protected $fillable = array(
		'url',
		'version',
		'right'
	);
}