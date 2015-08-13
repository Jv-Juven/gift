<?php

class   Object extends Eloquent{
	protected $table = 'content';

	protected $fillable = array(
		'object_id',
		'class'
	);

}