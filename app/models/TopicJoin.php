<?php

class   TopicJoin extends Eloquent{
	protected $table = 'topic_joins';

	protected $fillable = array(
		'topic_id',
		'user_id',
		'content',
		'scan_num',
		'focus_num',
		'com_num'
	);

}