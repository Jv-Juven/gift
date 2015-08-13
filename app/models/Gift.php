<?php

class   Gift extends Eloquent{
	protected $table = 'gifts';

	protected $fillable = array(
		'title',
		'price',
		'content',
		'scan_num',
		'focus_num',
		'scene_id',
		'object_id',
		'char_id'
	);

}