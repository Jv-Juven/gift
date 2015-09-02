<?php

class  Object extends Eloquent{
	protected $table = 'objects';

	protected $fillable = array(
		'object_id',
		'class'
	);

}