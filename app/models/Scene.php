<?php

class  Scene extends Eloquent{
	protected $table = 'scenes';

	protected $fillable = array(
		'scene_id',
		'_class'
	);

}