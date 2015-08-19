<?php

class   Gift extends Eloquent{
	protected $table = 'gifts';

	protected $fillable = array(
		'topic_id',
		'title',
		'price',
		'content',
		'gift_photo_intro',
		'scan_num',
		'focus_num',
		'scene_id',
		'object_id',
		'char_id',
		'taobao_url'
	);

	public function users()
	{
		return $this->belongsToMany('User','gift_focus','gift_id', 'user_id');
	}



}