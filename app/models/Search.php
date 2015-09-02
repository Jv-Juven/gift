<?php

class Search extends Eloquent{
	protected $table = 'search';

	protected $fillable = array(
		'label',
		'count'
	);
}