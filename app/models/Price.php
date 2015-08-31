<?php

class Price extends Eloquent{
	protected $table = 'prices';

	protected $fillable = array(
		'price_id',
		'low_price',
		'high_price'
	);
}