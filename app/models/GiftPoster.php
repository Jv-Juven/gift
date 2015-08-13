<?php

class GiftPoster  extends Eloquent{
	protected $table = 'gift_posters';

	protected $fillable = array(
		'gift_id',
		'url'
	);

}