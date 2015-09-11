<?php

class TopicReply extends Eloquent{
	protected $table = 'topic_replys';

	protected $fillable = array(
		'sender_id',
		'receiver_id',
		'topic_id',
	);
}