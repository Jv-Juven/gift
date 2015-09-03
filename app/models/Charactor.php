<?php

class  Charactor extends Eloquent{
	protected $table = 'charactors';

	protected $fillable = array(
		'char_id',
		'_class'
	);

}