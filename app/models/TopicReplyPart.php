<?php

class TopicReplyPart extends Eloquent{
	protected $table = 'topic_reply_parts';

	protected $fillable = array(
		'topic_reply_id',
		'content',
		'type',
	);
}