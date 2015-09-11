<?php

class TopicComPart extends Eloquent{
	protected $table = 'topic_com_parts';

	protected $fillable = array(
		'topic_com_id',
		'content',
		'type',
	);
}