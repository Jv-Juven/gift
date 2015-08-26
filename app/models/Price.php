<?php

class Price extends Eloquent{
	protected $table = 'prices';

	protected $fillable = array(
		'low_price',
		'high_price'
	);
}