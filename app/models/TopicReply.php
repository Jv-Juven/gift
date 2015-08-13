<?php

class TopicReply extends Eloquent{
	protected $table = 'topic_replys';

	protected $fillable = array(
		'topic_id',
		't_join_id',
		't_com_id',
		'sender_id',
		'receiver_id',
		'content'
	);
}